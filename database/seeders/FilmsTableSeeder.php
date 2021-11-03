<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('films') ->insert([
            [
                'title' => 'The tomorrow war',
                'author' => 'Chris McKay',
                'year' => 2021,
                'grade' => 10
            ],
            [
                'title' => 'Black Widow',
                'author' => 'Cate Shortland',
                'year' => 2021,
                'grade' => 8
            ],
            [
                'title' => 'Sonic',
                'author' => 'Jeff Fowler',
                'year' => 2020,
                'grade' => 7.5
            ],
            [
                'title' => 'Bad boys for life',
                'author' => 'Adil El Arbi',
                'year' => 2020,
                'grade' => 9
            ],
            [
                'title' => 'Wonderwoman 1984',
                'author' => 'Patty Jenkins',
                'year' => 2020,
                'grade' => 8
            ],
            [
                'title' => 'Krull',
                'author' => 'Peter Yates',
                'year' => 1983,
                'grade' => 10
            ]

        ]);
    }
}
