<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [];
        for($i = 0; $i < 10; $i++){

        	$data[] = [

        		'username' => str_random(10),
        		'password' => encrypt('123'),
        		'remember_token' => str_random(50),
        		'email' => str_random(5).'@sina.com',
        		'phone' => str_random(11),
        	];

        }
        \DB::table('user')->insert($data);
    }
}
