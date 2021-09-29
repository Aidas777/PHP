<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('lt_LT');

        DB::table('users')->insert([
            'name' => 'Aidas',
            'email' => 'egzaminas@egzaminas.com',
            'password' => Hash::make('123'),
        ]);



        $companysCount = 100;
        // $companysMass = ['Dange', 'Nemunas', 'Šušvė', 'Šventoji','Baltijos jūra',
        //     'Širvėnos ežeras', 'Šuoja', 'Erla', 'Nevėžis', 'Neris', 'Žižma'];

        foreach(range(1, $companysCount) as $r) {
            // $reserv = $companysMass[rand(0, count($companysMass)-1)];
            DB::table('companies')->insert([

                'name' => substr($faker->company, 0, 20),
                'address' => substr($faker->address,0, 150)
                // 'about' => $faker->realText(50)
            ]);
        }

        foreach(range(1, $companysCount) as $r) {
            DB::table('customers')->insert([

                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'phone' =>  '+37068'.rand(0, 9). rand(10000, 99999),
                'email' => $faker->email,
                'comment' => $faker->realText(30),
                'company_id' => rand(1, $companysCount)
            ]);
        }
    }
}
