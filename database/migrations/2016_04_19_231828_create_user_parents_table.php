<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_parents', function(Blueprint $table) {
			$table -> increments('id');
			$table -> timestamps();
			$table -> string('firstname');
			$table -> string('lastname');
			$table -> string('middle');
			$table -> string('username');
			$table -> string('password');
			$table -> string('picture');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('user_parents');
    }
}
