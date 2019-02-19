<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerType;
use App\Hotspot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();

        return view('customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_list = CustomerType::pluck('name','id');
        $hotspot_list = Hotspot::pluck('name', 'hotspot_id');

        return view('customer.create', compact('type_list', 'hotspot_list'));
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

        $customer = new Customer();
        $customer->id = Uuid::Uuid4()->getHex();
        $customer->customer_id = $customer->Maxno();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->phone  = $request->phone;
        $customer->birthday = $request->birthday;
        $customer->birthday_place = $request->birthday_place;
        $customer->gender = $request->gender;
        $customer->type_id = $request->type_id;
        $customer->hotspot_id = $request->hotspot_id;
        $customer->save();

        if (!$customer) {
            return redirect()->back()->withInput()->withError('cannot CREATE Customer data');
        }else{
            return redirect('/customer')->with('success', 'Successfully CREATE Customer');
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
        $customer = Customer::find($id);
        $type_list = CustomerType::pluck('name','id');
        $hotspot_list = Hotspot::pluck('name', 'hotspot_id');

        return view('customer.edit', compact('customer','type_list', 'hotspot_list'));
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

        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->phone  = $request->phone;
        $customer->birthday = $request->birthday;
        $customer->birthday_place = $request->birthday_place;
        $customer->gender = $request->gender;
        $customer->type_id = $request->type_id;
        $customer->hotspot_id = $request->hotspot_id;
        $customer->save();

        if (!$customer) {
            return redirect()->back()->withInput()->withError('cannot UPDATE Customer data');
        }else{
            return redirect('/customer')->with('success', 'Successfully UPDATE Customer');
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
        $custmer = Custoner::findOrFail($id);

        if (!$customer) {
            return redirect()->back()->withInput()->withError('cannot DELETE Customer data');
        }else{
            $customer->delete();
            return redirect('/customer')->with('success', 'Successfully DELETE Customer');
        }   
    }

    public function delete(Request $request)
    {
        # code...
    }
}
