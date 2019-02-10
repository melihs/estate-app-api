<?php

use App\Company;
use App\User;
use Faker\Generator as Faker;
use App\UserCompany;

$factory->define(UserCompany::class, function (Faker $faker) {
    return [
        'user_id' => function()
        {
            return User::all()->random();
        },
        'company_id' => function()
        {
            return Company::all()->random();
        }
    ];
});
