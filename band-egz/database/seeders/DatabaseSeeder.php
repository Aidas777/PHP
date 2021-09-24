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
            'name' => 'member',
            'email' => 'member@member.com',
            'password' => Hash::make('123'),
        ]);

        $reservoirsCount = 50;
        $reservoirsMass = ['Dange'=> (rand(1,100) .'.'.rand(100, 999)), 'Nemunas'=> (rand(1,100) .'.'.rand(100, 999)),
            'Šušvė'=> (rand(1,100) .'.'.rand(100, 999)), 'Šventoji'=> (rand(1,100) .'.'.rand(100, 999)),
            'Baltijos jūra'=> (rand(1,100) .'.'.rand(100, 999)), 'Širvėnos ežeras'=> (rand(1,100) .'.'.rand(100, 999)),
            'Šuoja'=> (rand(1,100) .'.'.rand(100, 999)), 'Erla'=> (rand(1,100) .'.'.rand(100, 999)),
            'Nevėžis'=> (rand(1,100) .'.'.rand(100, 999)), 'Neris'=> (rand(1,100) .'.'.rand(100, 999)),
            'Žižma'=> (rand(1,100) .'.'.rand(100, 999))];

        // $reservoirsMass = ['Dange'=> 2, 'Nemunas'=> 6,
        // 'Šušvė'=> 8];
        $arrkeys = array_keys($reservoirsMass);

        foreach(range(1, $reservoirsCount) as $n) {
            // var_dump($n);
            // $reserv = $reservoirsMass[rand(0, count($reservoirsMass)-1)];
            $arrvals = $reservoirsMass[$arrkeys[rand(0, count($reservoirsMass)-1)]];
            $arrkey = $arrkeys[rand(0, count($reservoirsMass)-1)];
            $arrval = $reservoirsMass[$arrkey];
            $are = $arrvals;
           
            // $are=rand(1,100) .'.'.rand(100, 999);
            // $are=10;
            DB::table('reservoirs')->insert([

                'title' => $arrkey,
                // 'area' => $faker->lastName(),

                // 'title' => 'Minija',
                'area' => $arrval,
                'about' => $faker->realText(50)
            ]);
        }

        foreach(range(1, $reservoirsCount) as $r) {
            $exper = rand(1, 20);
            DB::table('members')->insert([

                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'live' => $faker->city(),
                'experience' => $exper,
                'registered' => rand(0, $exper),

                'reservoir_id' => rand(1, $reservoirsCount)
            ]);
        }

    }
}
