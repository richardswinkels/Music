<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bands')->insert([
            'name' => 'Bon Jovi',
            'genre' => 'Hardrock',
            'founded' => 1983,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bands')->insert([
            'name' => 'Metallica',
            'genre' => 'Heavy metal',
            'founded' => 1981,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bands')->insert([
            'name' => 'AC/DC',
            'genre' => 'Hardrock',
            'founded' => 1973,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bands')->insert([
            'name' => 'Motörhead',
            'genre' => 'Heavy metal',
            'founded' => 1975,
            'active_till' => 2015,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
