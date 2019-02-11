<?php

use App\User;
use App\Company;
use App\UserCompany;
use App\Appointment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,10)->create();
        factory(Company::class,10)->create();
        factory(UserCompany::class,10)->create();
        factory(Appointment::class,10)->create();
        $this->call(UserSeeder::class);
    }
}
