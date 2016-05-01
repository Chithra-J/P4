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
        'gender' => 'female',
        'lastname' => 'Jack',
        'email' => 'jill@harvard.edu',
        'name' => 'Jill',
        'password' => \Hash::make('helloworld'),
	    ]);
		DB::table('users')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'firstname' => 'Chithra',
        'gender' => 'female',
        'lastname' => 'Jaya',
        'email' => 'chit@w.com',
        'name' => 'chits',
        'password' => \Hash::make('helloworld'),
	    ]);
		DB::table('users')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'firstname' => 'Srini',
        'gender' => 'male',
        'lastname' => 'Bala',
        'email' => 'sb@w.com',
        'name' => 'Srini',
        'password' => \Hash::make('helloworld'),
    	]);
    }
}
