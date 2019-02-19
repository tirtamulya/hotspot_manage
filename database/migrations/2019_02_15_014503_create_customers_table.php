<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_types', function(Blueprint $table){
            $table->string('id')->primary();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('customer_id')->unique();
            $table->string('name');
            $table->text('address')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('birthday')->nullable();
            $table->string('birthday_place')->nullable();
            $table->enum('gender',['male','female'])->nullable();
            $table->string('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('customer_types')->onUpdate('cascade')->onDelete('set null');

            $table->string('hotspot_id')->nullable();
            $table->foreign('hotspot_id')->references('hotspot_id')->on('hotspots')->onUpdate('cascade')->onDelete('set null');

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
        Schema::dropIfExists('customers');
        Schema::dropIfExists('customer_types');
    }
}
