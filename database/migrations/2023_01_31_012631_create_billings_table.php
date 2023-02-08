<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Billing;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_number');
           
            $table->enum('status',[Billing::ACEPTADO,Billing::PENDIENTE,Billing::RECHAZADO]);
            $table->string('voucher');
            $table->string('serie');
            $table->string('number');
         
            $table->float('tax',6,2);
            $table->float('net',6,2);
            $table->float('total');
            $table->float('discount',6,2);     

           
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
        Schema::dropIfExists('billings');
    }
};
