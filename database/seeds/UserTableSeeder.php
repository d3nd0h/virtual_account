<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => "Pemi",
            'username' => "admin",
            'password' => bcrypt('pemicantik')
            ],[
            'name' => "Desmond",
            'username' => "babyblues",
            'password' => bcrypt('2506')
            ],[
            'name' => "Vanny",
            'username' => "vaniest",
            'password' => bcrypt('2803')
            ]
        ]);
    }
}
