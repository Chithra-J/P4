<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->delete();
    	$parent_id = (DB::table('users')->where('email', '=', 'jill@harvard.edu')->select('id')->first());
		$child_id = (DB::table('children')->where('user_id', '=', $parent_id->id)->select('id')->first());
        DB::table('events')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'user_id' => $parent_id->id,        
        'child_id' => $child_id->id,
        'event_name' => 'Math League',
        'level' => 'State',
        'rounds' => 'Qualifier',
        'standing' => 'first place',
        'event_date' => '2006-10-01',
        'winner' => true,
        'grade' => '5',
        'school_year' => '2005',
        'school_name' => 'HMS',
        'picture_location' => 'uploads/'.$parent_id->id.'/',
    	]);
    	$parent_id = (DB::table('users')->where('email', '=', 'chit@w.com')->select('id')->first());
		$child_id = (DB::table('children')->where('user_id', '=', $parent_id->id)->select('id')->first());
        DB::table('events')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'user_id' => $parent_id->id,        
        'child_id' => $child_id->id,
        'event_name' => 'VEX',
        'standing' => 'first place',
        'level' => 'State',
        'rounds' => 'Qualifier',
        'event_date' => '2016-10-01',
        'winner' => true,
        'grade' => '4',
        'school_year' => '2005',
        'school_name' => 'PMA',
        'picture_location' => 'uploads/'.$parent_id->id.'/',
    	]);
		
		
    }
}
