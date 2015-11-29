<?php

use Illuminate\Database\Seeder;

class TransactionCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_codes')->insert([[
            'transaction_code' => "T001",
            'transaction_name' => "kredit",
            'multiplier'       => 1
            ],[
            'transaction_code' => "T002",
            'transaction_name' => "debit",
            'multiplier'       => -1
            ],[
            'transaction_code' => "T003",
            'transaction_name' => "bunga",
            'multiplier'       => 1
            ]]
        );
    }
}
