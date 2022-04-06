<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->insert([
            'title' => 'Living on a prayer',
            'singer' => 'Bon Jovi',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('songs')->insert([
            'title' => 'Nothing else matters',
            'singer' => 'Metallica',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('songs')->insert([
            'title' => 'Thunderstruck',
            'singer' => 'AC/DC',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('songs')->insert([
            'title' => 'Back in black',
            'singer' => 'AC/DC',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('songs')->insert([
            'title' => 'Ace of spades',
            'singer' => 'Motörhead',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
