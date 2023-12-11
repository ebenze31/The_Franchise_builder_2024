<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_group')->nullable();
            $table->string('logo')->nullable();
            $table->string('host')->nullable();
            $table->string('member')->nullable();
            $table->string('key_invite')->nullable();
            $table->string('status')->nullable();
            $table->string('request_join')->nullable();
            $table->string('rank_of_week')->nullable();
            $table->string('rank_last_week')->nullable();
            $table->string('rank_record')->nullable();
            $table->string('group_line_id')->nullable();
            
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('groups');
    }
}
