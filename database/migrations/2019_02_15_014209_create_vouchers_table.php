<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radius_settings', function(Blueprint $table){
            $table->string('id')->primary();
            $table->string('name')->unique();
            $table->text('notes')->nullable();
            $table->string('category')->nullable();
            $table->timestamps();
        });
        Schema::create('voucher_types', function (Blueprint $table){
            $table->string('id')->primary();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('vouchers', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('voucher_id')->unique();
            $table->string('name');
            $table->string('price');
            $table->string('radius_type')->nullable();
            $table->string('radius_value')->nullable();
            $table->text('description')->nullable();

            $table->string('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('voucher_types')->onUpdate('set null');

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
        Schema::dropIfExists('vouchers');
        Schema::dropIfExists('voucher_types');
        Schema::dropIfExists('radius_settings');
    }
}
