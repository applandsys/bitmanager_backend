<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Manager-1",
            'email' => 'bitmanager@gmail.com',
            'role' => 'admin',
            'contact_number' => '01837664478',
            'password' => Hash::make('12345678'),
        ]);
    }
}
