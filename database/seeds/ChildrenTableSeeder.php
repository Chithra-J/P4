<?php

use Illuminate\Database\Seeder;

class ChildrenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('children')->delete();
    	$parent_id = (DB::table('users')->where('email', '=', 'jill@harvard.edu')->select('id')->first());
        DB::table('children')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'user_id' => $parent_id->id,        
        'firstname' => 'Jim',
        'lastname' => 'Jack',
        'gender' => 'male',
        'date_of_birth' => '2006-10-01',
        'picture_location' => 'uploads/'.$parent_id->id.'/',
    	]);
    	$parent_id = (DB::table('users')->where('email', '=', 'jill@harvard.edu')->select('id')->first());
        DB::table('children')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'user_id' => $parent_id->id,        
        'firstname' => 'Jing',
        'lastname' => 'Jack',
        'gender' => 'male',
        'date_of_birth' => '2010-10-01',
        'picture_location' => 'uploads/'.$parent_id->id.'/',
    	]);
    	$parent_id = (DB::table('users')->where('email', '=', 'jamal@harvard.edu')->select('id')->first());
        DB::table('children')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'user_id' => $parent_id->id,        
        'firstname' => 'Jimmy',
        'lastname' => 'Jamal',
        'gender' => 'male',
        'date_of_birth' => '2006-10-01',
        'picture_location' => 'uploads/'.$parent_id->id.'/',
    	]);
		$parent_id = (DB::table('users')->where('email', '=', 'chit@w.com')->select('id')->first());	
        DB::table('children')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'user_id' => $parent_id->id,        
        'firstname' => 'Rach',
        'lastname' => 'Bala',
        'gender' => 'female',
        'date_of_birth' => '2010-10-01',
        'picture_location' => 'uploads/'.$parent_id->id.'/',
    	]);
		$parent_id = (DB::table('users')->where('email', '=', 'sb@w.com')->select('id')->first());
        DB::table('children')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'user_id' => $parent_id->id,        
        'firstname' => 'Rasi',
        'lastname' => 'Bala',
        'gender' => 'male',
        'date_of_birth' => '2005-10-01',
        'picture_location' => 'uploads/'.$parent_id->id.'/',
    	]);
	
    }
}
