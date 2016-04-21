<?php

use Illuminate\Database\Seeder;

class UserParentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_parents')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'firstname' => 'Jill',
        'lastname' => 'Jack',
        'username' => 'jill@harvard.edu',
        'password' => 'helloworld',
        'picture' => 'somewhere',
    ]);
    }
}
