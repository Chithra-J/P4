<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();
        DB::table('users')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'firstname' => 'Jill',
        'gender' => 'Female',
        'lastname' => 'Jack',
        'email' => 'jill@harvard.edu',
        'name' => 'Jill',
        'password' => \Hash::make('helloworld'),
	    ]);
		DB::table('users')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'firstname' => 'Jamal',
        'gender' => 'Male',
        'lastname' => 'Jamal',
        'email' => 'jamal@harvard.edu',
        'name' => 'Jamal',
        'password' => \Hash::make('helloworld'),
	    ]);
		DB::table('users')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'firstname' => 'Chithra',
        'gender' => 'Female',
        'lastname' => 'Jaya',
        'email' => 'chit@w.com',
        'name' => 'chits',
        'password' => \Hash::make('helloworld'),
	    ]);
		DB::table('users')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'firstname' => 'Srini',
        'gender' => 'Male',
        'lastname' => 'Bala',
        'email' => 'sb@w.com',
        'name' => 'Srini',
        'password' => \Hash::make('helloworld'),
    	]);
    }
}
