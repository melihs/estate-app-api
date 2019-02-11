<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'test',
            'surname' => 'test surname',
            'address' => 'test address',
            'phone' => '123456788',
            'personel' => '1',
            'password' => bcrypt('123456'),
            'email' => 'test@test.com'
        ]);
    }
}
