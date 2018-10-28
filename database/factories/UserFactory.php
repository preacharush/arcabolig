<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(app\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\company::class, function (Faker $faker) {
    return [
        'Comp_reg_nr' =>$faker->ean8,
        'Comp_name' =>$faker->unique()->company,
        'email' =>$faker->unique()->safeEmail, 
        'phone' =>$faker->phoneNumber,
        'address_id' =>$faker->numberBetween($min = 1, $max = 10),
    ];
});

$factory->define(App\address::class, function (Faker $faker) {
    return [
        'address' =>$faker->streetAddress,
        'address2' =>$faker->streetAddress,
        'district' =>$faker->stateAbbr,
        'city_id' =>$faker->numberBetween($min = 1, $max = 10),
    ];
});


$factory->define(App\city::class, function (Faker $faker) {
    return [
        'city' =>$faker->city,
        'zipcode' =>$faker->postcode,
        'country_id' =>$faker->numberBetween($min = 1, $max = 10)
    ];
});

$factory->define(App\country::class, function (Faker $faker) {
    return [
        'country' =>$faker->country,
    ];
});

