<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('question')->nullable();
            $table->string('reading')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('staff_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contact_staffs');
    }
}
