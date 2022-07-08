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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mc');
            $table->string('dot');
            $table->boolean('is_mover')->default(0);
            $table->boolean('is_driver')->default(0);
            $table->string('address')->nullable();
            $table->integer('zip')->nullable();
            $table->string('phone')->nullable();
            $table->string("avatar")->nullable();
            $table->string('website')->nullable();
            $table->boolean('active')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
