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
                'name' => 'Pick Up',
				'rent' => '500'
            ],
            [
                'name' => 'Cover Van',
				'rent' => '600'
    
            ],
            [
                'name' => 'Auto Rikshaw',
				'rent' => '700'
            ],
            [
                'name' => 'Man',
				'rent' => '50'
            ]

        ]);
    }
}
