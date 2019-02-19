<?php

namespace App\Http\Controllers;

use App\Hotspot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class HotspotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotspot = Hotspot::all();

        return view('hotspot.index', compact('hotspot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotspot.create');
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

        $hs = new Hotspot();
        $hs->id = Uuid::uuid4()->getHex();
        $hs->hotspot_id = $hs->Maxno();
        $hs->name = $request->name;
        $hs->address = $request->address;
        $hs->phone = $request->phone;
        $hs->ip_address = $request->ip_address;
        $hs->print_port = $request->print_port;
        $hs->save();

        if (!$hs) {
            return redirect()->back()->withInput()->withError('cannot CREATE Hotspot data');
        }else{
            return redirect('/hotspot')->with('success', 'Successfully CREATE Hotspot');
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
        $hotspot = Hotspot::find($id);

        return view('hotspot.edit', compact('hotspot'));
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

        $hs = Hotspot::find($id);
        $hs->name = $request->name;
        $hs->address = $request->address;
        $hs->phone = $request->phone;
        $hs->ip_address = $request->ip_address;
        $hs->print_port = $request->print_port;
        $hs->save();

        if (!$hs) {
            return redirect()->back()->withInput()->withError('cannot UPDATE Hotspot data');
        }else{
            return redirect('/hotspot')->with('success', 'Successfully UPDATE Hotspot');
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
}
