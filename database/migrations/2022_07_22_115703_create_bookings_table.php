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
        Schema::create('bookings', function (Blueprint $table) {
            $table->char('booking_id', 12)->primary();
            $table->foreignId('customer_id')->constrained('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('barberman_id')->references('barberman_id')->on('barbermen')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('service_id')->references('service_id')->on('services')->onUpdate('cascade')->onDelete('restrict');
            $table->date('booking_date')->nullable();
            $table->time('booking_time')->nullable();
            $table->enum('booking_status', ['Waiting', 'Accept', 'Cancel', 'Done'])->nullable();
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
        Schema::dropIfExists('bookings');
    }
};
