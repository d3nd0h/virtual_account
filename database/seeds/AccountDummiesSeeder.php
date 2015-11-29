<?php

use Illuminate\Database\Seeder;

class AccountDummiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<=10;$i++){
            factory('App\Models\Account')->create();
        }
    }
}
