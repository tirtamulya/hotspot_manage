<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->string('id')->primary();

            $table->string('sales_id')->unique();
            
            $table->string('customer_id')->nullable();
            $table->foreign('customer_id')->on('customers')->references('customer_id')->onUpdate('cascade');

            $table->string('voucher_id')->nullable();
            $table->foreign('voucher_id')->on('vouchers')->references('voucher_id')->onUpdate('cascade');

            $table->double('sales_amount');
            $table->string('customer_name');
            $table->string('customer_password');

            $table->string('hotspot_id')->nullable();
            $table->foreign('hotspot_id')->references('hotspot_id')->on('hotspots')->onUpdate('cascade')->onDelete('set null');

            $table->string('user_id');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
