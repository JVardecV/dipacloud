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
        App\user::create([
        	'name'	=> 'Javier Valdés',
        	'email' => 'nacho12442@gmail.com',
            'username' => 'javiervaldés',
        	'password' => bcrypt('qwerty789'),
        ]);

        App\user::create([
            'name'  => 'Diego Aburto',
            'email' => 'd.aburto@gmail.com',
            'username' => 'diegoaburto',
            'password' => bcrypt('qwerty789'),
        ]);
    }
}
