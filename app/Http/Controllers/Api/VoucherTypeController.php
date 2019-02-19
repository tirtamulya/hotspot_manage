<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\RadiusAccounting;
use App\VoucherType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class VoucherTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // vouchers.sales.rad_acct
        $vt =  VoucherType::wherehas('vouchers',function($query){
                                $query->whereHas('sales', function($query){
                                    $query->whereHas('rad_acct', function($query){
                                        $query->whereDate('acctstarttime', date("Y-m-d"));
                                    });
                                });
                            })
                            ->with(['vouchers.sales.rad_acct.rad_check'])
                            ->where('id', 'H')
                            ->get();
        
        if ($vt->count() > 0) {
            foreach ($vt as $type) {
                foreach ($type->vouchers as $voucher) {
                    foreach ($voucher->sales as $sales) {
                        foreach($sales->rad_acct as $acct){
                            if ($acct->acctsessiontime  >= $voucher->radius_value) {
                                foreach ($acct->rad_check as $check) {
                                    $check->delete();
                                    return Response::json([
                                        'error'=>false,
                                        'message'=>'Success',
                                        'code'=> 200
                                    ], 200);
                                }
                            }
                        }
                    }
                }
            }
        }else{
            return Response::json([
                'error'=>true,
                'message'=>'Failed',
                'code'=> 500
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
}
