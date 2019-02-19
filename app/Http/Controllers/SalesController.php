<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Hotspot;
use App\RadiusCheck;
use App\Sale;
use App\Sales;
use App\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\Printer;
use Ramsey\Uuid\Uuid;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::orderBy('sales_id' ,'desc')->get();

        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer_list = Customer::pluck('name', 'customer_id')->toArray();
        $voucher_list = Voucher::pluck('name', 'voucher_id')->toArray();

        return view('sales.create', compact('customer_list', 'voucher_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'name' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages(); 
            
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $sales = new Sale();
        $sales->id = Uuid::Uuid4()->getHex();
        $sales->sales_id = $sales->Maxno();
        $sales->customer_id = $request->customer_id;
        $sales->voucher_id  = $request->voucher_id;

        // GET Voucher amount to Sales
        $v = Voucher::where('voucher_id', $request->voucher_id)->first();
        $sales->sales_amount = $v->price;

        if ($request->customer_id) {
            $customer = Customer::where('customer_id', $request->customer_id)->first();
            $sales->customer_name = $customer->email;
        }else{
            $sales->customer_name = $this->randomString(); 
        }

        $sales->customer_password = $this->randomString(8);
        $sales->hotspot_id = auth()->user()->hotspot_id;
        $sales->user_id = auth()->user()->id;
        $sales->save();

        $rc = new RadiusCheck();
        $rc->username = $sales->customer_name;
        $rc->attribute = 'Cleartext-Password';
        $rc->op = ':=';
        $rc->value = $sales->customer_password;
        $rc->save();

        $vc =Voucher::where('voucher_id', $request->voucher_id)->first();
        $rc = new RadiusCheck();
        $rc->username = $sales->customer_name;
        $rc->attribute = $vc->radius_type;
        $rc->op = ':=';
        $rc->value = $vc->radius_value;
        $rc->save();

        $this->printAccount($sales->id);

        if (!$sales) {
            return redirect()->back()->withInput()->withError('cannot CREATE Sale data');
        }else{
            return redirect('/sales')->with('success', 'Successfully CREATE Sales');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::find($id);
        $customer_list = Customer::pluck('name', 'customer_id')->toArray();
        $voucher_list = Voucher::pluck('name', 'voucher_id')->toArray();

        return view('sales.edit', compact('customer_list', 'voucher_list','sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function randomString($length = 5) 
    {
        $str = "";
        $characters = range('A','Z');
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    public function printAccount($id)
    {
        $hs =  Hotspot::where('hotspot_id',auth()->user()->hotspot_id)->first();
        
        $sales = Sale::find($id);

        try {
            // $connector = new FilePrintConnector($printerPort->printer_port);
            $connector = new NetworkPrintConnector($hs->ip_address, $hs->print_port);
            $printer = new Printer($connector);
            $printer -> pulse();

            /* 48 Point Thermal Printer*/
            $printer -> setJustification(Printer::JUSTIFY_CENTER);        
            $printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $printer -> setTextSize(1,3);
            $printer -> text("\n================================================\n");
            $printer -> text("INTERMEDIA INTERNET HOTSPOT.\n");
            $printer -> text("================================================\n");
            
            // SET ACCOUNT
            $printer -> setJustification(Printer::JUSTIFY_LEFT);
            $printer -> setEmphasis(true);
            $printer -> setTextSize(2,1);
            $printer -> text('username: '.$sales->customer_name);
            $printer->text("\n");
            $printer -> text('password: '.$sales->customer_password);
            $printer->text("\n");


            $printer -> feed(2);
            $printer -> cut();
            $printer -> close();
        } catch (Exception $e) {
            $printer -> text($e -> getMessage() . "\n");
        } finally {
            return redirect('/sales')->with('success', 'Successfully PRINT Sales');
        }

        return redirect('/sales')->with('success', 'Successfully PRINT Sales');
    }
}
