<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $titles = array('Home alone', 'Ghost','Avengers','Jaws');
        $authors = array('John Hughes','Bruce Rubin','Joss Whedon','Steven Spilberg');
        $years = array(1990, 1990, 2012, 1975);
        for ($i=0;$i <= count($titles);$i++){
            DB::table('films')->insert([
                'title' => $titles[$i],
                'author' => $authors[$i],
                'year' => $years[$i],
            ]);
        }


    }
}
