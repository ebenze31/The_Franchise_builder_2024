<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPcGrandOfGweekToPcPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pc_points', function (Blueprint $table) {
            $table->string('pc_grand_of_gweek')->nullable();
            $table->string('pc_grand_last_gweek')->nullable();
            $table->string('nc_grand_of_gweek')->nullable();
            $table->string('nc_grand_last_gweek')->nullable();
            $table->string('pc_grand_of_week_individual')->nullable();
            $table->string('pc_grand_last_week_individual')->nullable();
            $table->string('nc_grand_of_week_individual')->nullable();
            $table->string('nc_grand_last_week_individual')->nullable();
            $table->string('sum_newcode_team')->nullable();
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
