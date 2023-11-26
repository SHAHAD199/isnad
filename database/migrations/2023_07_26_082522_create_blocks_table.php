<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constraind()->onDelete('cascade');
            $table->integer('number');
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('title');
            $table->integer('area');
            $table->string('color', 80);
            $table->integer('status')->default(0);
            $table->string('block');
            $table->integer('rooms_number');
            $table->text('note')->nullable();
            $table->string('updated_by');
            $table->string('img')->nullable();
            $table->string('assistant')->nullable();
            $table->datetime('booking_date')->nullable();
            $table->datetime('date_of_sale')->nullable();
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
        Schema::dropIfExists('blocks');
    }
};
