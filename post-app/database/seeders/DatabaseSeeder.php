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
            'name' => 'Post',
            'email' => 'post@post.com',
            'password' => Hash::make('123'),
        ]);

        $postsCount = 300;
        $postsMass = ['Dange', 'Nemunas', 'Šušvė', 'Šventoji','Baltijos jūra',
            'Širvėnos ežeras', 'Šuoja', 'Erla', 'Nevėžis', 'Neris', 'Žižma'];

        // foreach(range(1, $reservoirsCount) as $r) {
            // $reserv = $reservoirsMass[rand(0, count($reservoirsMass)-1)];
            // $are=rand(1,100) .'.'.rand(100, 999);



        foreach(range(1, $postsCount) as $r) {
            DB::table('posts')->insert([

                'town' =>  $faker->city,
                // 'area' => $faker->lastName(),

                // 'title' => 'Minija',
                'capacity' => rand(1, 300),
                'code' => chr(rand(65, 90)). chr(rand(65, 90)) .'-' .rand(10, 999)
                // 'code' => $faker->realText(50)
            ]);
        }

        foreach(range(1, $postsCount) as $r) {
            $exper = rand(1, 20);
            // $tel = ' '. strval(rand(0, 9) .rand(0, 9) .rand(0, 9). rand(0, 9). rand(0, 9));
            DB::table('parcels')->insert([

                
                'weight' => rand(1, 200),
                // 'phone' => substr($faker->e164PhoneNumber,0,12),
                'phone' => '+37068'.rand(0, 9). rand(10000, 99999),
                'info' => $faker->realText(50),
                'post_id' => rand(1, $postsCount)
            ]);
        }
    }
}
