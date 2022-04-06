<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->insert([
            'name' => 'Slippery when wet',
            'year' => 1986,
            'times_sold' => 28000000,
        ]);

        DB::table('albums')->insert([
            'name' => 'Metallica',
            'year' => 1991,
            'times_sold' => 23000000,
        ]);

        DB::table('albums')->insert([
            'name' => 'The Razors Edge',
            'year' => 1990,
            'times_sold' => 11000000,
        ]);

        DB::table('albums')->insert([
            'name' => 'Back in Black',
            'year' => 1980,
            'times_sold' => 50000000,
        ]);

        DB::table('albums')->insert([
            'name' => 'Ace of Spades',
            'year' => 1980,
            'times_sold' => 100000,
        ]);
    }
}
