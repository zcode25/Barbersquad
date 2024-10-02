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
        Schema::create('barbermen', function (Blueprint $table) {
            $table->id('barberman_id');
            $table->string('barberman_name', 50);
            $table->string('barberman_username', 50)->unique();
            $table->string('barberman_email', 50)->unique();
            $table->char('barberman_telephone', 15);
            $table->string('barberman_address');
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
        Schema::dropIfExists('barbermen');
    }
};
