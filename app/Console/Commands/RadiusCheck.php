<?php

namespace App\Console\Commands;

use App\VoucherType;
use Illuminate\Console\Command;

class RadiusCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'radius:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Connect Radius DB to check limitation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
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
                                    $this->info('radius has been checked');
                                }
                            }
                        }
                    }
                }
            }
        }else{
            $this->info('radius cannot check');
        }
    }
}
