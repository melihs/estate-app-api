<?php

use App\Appointment;
use App\Company;
use Faker\Generator as Faker;

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'company_id' => function(){
        return Company::all()->random();
        },
        'distance' => $faker->randomFloat(),
        'date' => date_format($faker->dateTime,'Y-m-d\TH:i:s'),
        'location' => $faker->city
    ];
});
