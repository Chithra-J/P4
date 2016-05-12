<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('event_name');
            $table->date('event_date');
			# School, District, State, National, World
            $table->string('level')->nullable();;
			# Number of rounds
			$table->string('rounds');
			# Ranking in the event
            $table->string('standing');
			# Won the event
			$table->boolean('winner')->nullable();
            $table->string('grade');
            $table->string('school_year');
			$table->string('school_name');
			$table->string('picture_location');
			$table->integer('user_id')->unsigned();
			$table->integer('child_id')->unsigned();
			$table->foreign('user_id')
			  ->references('id')->on('users')
			  ->onDelete('cascade')
			  ->onUpdate('cascade');
			$table->foreign('child_id')
			  ->references('id')->on('children')
			  ->onDelete('cascade')
			  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
