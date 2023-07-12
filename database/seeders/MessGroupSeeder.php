<?php

namespace Database\Seeders;

use Faker\Provider\ar_EG\Internet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MessGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mess_groups')->insert([
            'id' => rand(10,100)
        ]);
    }
}
