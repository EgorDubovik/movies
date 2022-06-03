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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('address_from');
            $table->integer('zip_from');
            $table->string('address_to');
            $table->integer('zip_to');
            $table->text('description')->nullable();
            $table->float('volume');
            $table->float('price')->nullable();
            $table->date('date_send')->nullable();
            $table->date('date_recive')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
