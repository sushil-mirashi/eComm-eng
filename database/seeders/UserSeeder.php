<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'NAME' => "Itachi",
            'EMAIL' => "itachiuchiha@gmail.com",
            'PASSWORD' => Hash::make('12345'),
            'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
        ]);
    }
}