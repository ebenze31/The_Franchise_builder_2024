<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePcPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_points', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('week')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('pc_point')->nullable();
            $table->integer('new_code')->nullable();
            $table->string('rank_of_week')->nullable();
            $table->string('rank_last_week')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pc_points');
    }
}
