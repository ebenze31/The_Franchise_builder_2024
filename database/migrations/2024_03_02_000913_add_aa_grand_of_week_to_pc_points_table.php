<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAaGrandOfWeekToPcPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pc_points', function (Blueprint $table) {
            $table->string('aa_grand_of_week')->nullable();
            $table->string('aa_grand_last_week')->nullable();
            $table->string('aa_grand_of_week_individual')->nullable();
            $table->string('aa_grand_last_week_individual')->nullable();
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
