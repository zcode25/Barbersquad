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
        Schema::create('transactions', function (Blueprint $table) {
            $table->char('transaction_id', 12)->primary();
            $table->char('booking_id', 12);
            $table->foreign('booking_id')->references('booking_id')->on('bookings')->onUpdate('cascade')->onDelete('restrict');
            $table->date('transaction_date');
            $table->integer('transaction_discount');
            $table->integer('transaction_amount');
            $table->enum('transaction_status', ['Waiting', 'Done']);
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
        Schema::dropIfExists('transactions');
    }
};
