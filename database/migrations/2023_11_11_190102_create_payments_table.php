<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('block_id')->constrained()->onDelete('cascade');
            $table->integer('first_payment');
            $table->integer('second_payment');
            $table->integer('third_payment');
            $table->integer('fourth_payment');
            $table->integer('fifth_payment');
            $table->integer('sixth_payment');
            $table->integer('seventh_payment');
            $table->integer('eighth_payment');
            $table->integer('ninth_payment');
            $table->integer('tenth_payment');
            $table->integer('eleventh_payment');
            $table->integer('twelfth_payment');
            $table->integer('thirteenth_payment');
            $table->integer('fourteenth_payment');
            $table->integer('fifteenth_payment');
            $table->integer('sixteenth_payment');
            $table->integer('seventeenth_payment');
            $table->integer('total');          
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
        Schema::dropIfExists('payments');
    }
}
