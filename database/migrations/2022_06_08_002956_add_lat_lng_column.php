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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('lat_from')->nullable()->after('zip_from');
            $table->string('long_from')->nullable()->after('lat_from');
            $table->string('lat_to')->nullable()->after('zip_to');
            $table->string('long_to')->nullable()->after('lat_to');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('lat_from');
            $table->dropColumn('long_from');
            $table->dropColumn('lat_to');
            $table->dropColumn('long_to');
        });
    }
};
