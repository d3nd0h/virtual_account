<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
    	'username' => $faker->username,
        'name' => $faker->name,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Account::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'birthdate' => $faker->date,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
    ];
});

$factory->define(App\Models\TransactionCode::class, function (Faker\Generator $faker) {
    return [
        'transaction_code' => $faker->word,
        'transaction_name' => $faker->word,
        'multiplier' => $faker->randomElement($array = [-1, 1]),
    ];
});

$factory->define(App\Models\Transaction::class, function (Faker\Generator $faker) {
    return [
    	'account_id' => 1,
    	'transaction_code_id' => 1,
    	'date' => $faker->date,
    	'amount' => $faker->randomNumber,
    	'user_id' => 1,
    ];
});

$factory->define('App\Models\test', function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});