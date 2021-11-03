<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actors') ->insert([
            [
                'film_id' => 1,
                'name' => 'Chris Prat',
            ],
            [
                'film_id' => 2,
                'name' => 'Scarlet Johanson',
            ],
            [
                'film_id' => 3,
                'name' => 'Jim Carrey',
            ],
            [
                'film_id' => 4,
                'name' => 'Will Smith',
            ],
            [
                'film_id' => 4,
                'name' => 'Martin Lawrence',
            ],
            [
                'film_id' => 5,
                'name' => 'Gal Gadot',
            ],
            [
                'film_id' => 5,
                'name' => 'Chris Pine',
            ],
            [
                'film_id' => 6,
                'name' => 'Ken Marshall',
            ],
            [
                'film_id' => 6,
                'name' => 'Liam Neeson',
            ]
            ]);
    }
}
