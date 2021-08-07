<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transports')->insert([

            [
                'name' => 'Pick Up'
            ],
            [
                'name' => 'Cover Van'
    
            ],
            [
                'name' => 'Auto Rikshaw'
            ],
            [
                'name' => 'Man'
            ]

        ]);
    }
}
