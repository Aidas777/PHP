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



        // $reservoirsCount = 30;
        // $reservoirsMass = ['Dange', 'Nemunas', 'Šušvė', 'Šventoji','Baltijos jūra',
        //     'Širvėnos ežeras', 'Šuoja', 'Erla', 'Nevėžis', 'Neris', 'Žižma'];

        // foreach(range(1, $reservoirsCount) as $r) {
        //     $reserv = $reservoirsMass[rand(0, count($reservoirsMass)-1)];
        //     $are=rand(1,100) .'.'.rand(100, 999);
        //     DB::table('reservoirs')->insert([

        //         'title' => $reserv,
        //         // 'area' => $faker->lastName(),

        //         // 'title' => 'Minija',
        //         'area' => $are,
        //         'about' => $faker->realText(50)
        //     ]);
        // }

        // foreach(range(1, $reservoirsCount) as $r) {
        //     $exper = rand(1, 20);
        //     DB::table('members')->insert([

        //         'name' => $faker->firstName,
        //         'surname' => $faker->lastName,
        //         'live' => $faker->city(),
        //         'experience' => $exper,
        //         'registered' => rand(0, $exper),

        //         'reservoir_id' => rand(1, $reservoirsCount)
        //     ]);
        // }
    }
}
