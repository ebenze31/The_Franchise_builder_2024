<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddYtdPcToPcPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pc_points', function (Blueprint $table) {
            $table->integer('ytd_pc')->nullable();
            $table->integer('mtd_pc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pc_points', function (Blueprint $table) {
            //
        });
    }
}
