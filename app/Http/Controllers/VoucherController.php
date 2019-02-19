<?php

namespace App\Http\Controllers;

use App\RadiusSetting;
use App\Voucher;
use App\VoucherType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = Voucher::all();

        return view('voucher.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $radius_setting = RadiusSetting::pluck('name','id');
        $type_list = VoucherType::pluck('name', 'id');

        return view('voucher.create', compact('radius_setting','type_list'));
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
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages(); 
            
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $vc = new Voucher();
        $vc->id = Uuid::uuid4()->getHex();
        $vc->voucher_id = $vc->Maxno();
        $vc->name = $request->name;
        $vc->price = $request->price;
        $vc->radius_type = $request->radius_type;
        $vc->radius_value = $request->radius_value;
        $vc->description = $request->description;
        $vc->type_id = $request->type_id;
        $vc->save();

        if (!$vc) {
            return redirect()->back()->withInput()->withError('cannot CREATE Voucher data');
        }else{
            return redirect('/voucher')->with('success', 'Successfully CREATE Voucher');
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
        $voucher = Voucher::find($id);

        $radius_setting = RadiusSetting::pluck('name','id');
        $type_list = VoucherType::pluck('name', 'id');

        return view('voucher.edit', compact('radius_setting','voucher','type_list'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages(); 
            
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $vc = Voucher::find($id);
        $vc->name = $request->name;
        $vc->price = $request->price;
        $vc->radius_type = $request->radius_type;
        $vc->radius_value = $request->radius_value;
        $vc->description = $request->description;
        $vc->type_id = $request->type_id;
        $vc->save();

        if (!$vc) {
            return redirect()->back()->withInput()->withError('cannot UPDATE Voucher data');
        }else{
            return redirect('/voucher')->with('success', 'Successfully UPDATE Voucher');
        }
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

    public function delete(Request $request)
    {
        # code...
    }
}
