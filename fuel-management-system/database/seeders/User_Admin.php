<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class   User_Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'abhinna',
            'email' => 'abhinna@oic.com',
            'password' => bcrypt('111111111')
        ]);

        DB::table('users')->insert([
            'name' => 'maniram',
            'email' => 'maniram@oic.com',
            'password' => bcrypt('111111111')
        ]);

        DB::table('users')->insert([
            'name' => 'durga',
            'email' => 'durga@oic.com',
            'password' => bcrypt('111111111')
        ]);

        DB::table('users')->insert([
            'name' => 'basanta',
            'email' => 'basanta@oic.com',
            'password' => bcrypt('111111111')
        ]);

        DB::table('admins')->insert([
            'user' => '1'
        ]);
        DB::table('customers')->insert([
            'user' => '2',
            'license_number' => '11000802',
        ]);

        DB::table('fueltypes')->insert([
            'name' => 'diesel',
        ]);
        DB::table('fueltypes')->insert([
            'name' => 'petrol',
        ]);

        DB::table('fuelschemes')->insert([
            'end_at' => 25.00,
            'price' => 125.00,
            'fuel' => 1,
        ]);
        DB::table('fuelschemes')->insert([
            'end_at' => 50.00,
            'price' => 150.00,
            'fuel' => 1,
        ]);
        DB::table('fuelschemes')->insert([
            'end_at' => 100.00,
            'price' => 175.00,
            'fuel' => 1,
        ]);
        DB::table('fuelschemes')->insert([
            'end_at' => 200.00,
            'price' => 200.00,
            'fuel' => 1,
        ]);
        DB::table('fuelschemes')->insert([
            'end_at' => 500.00,
            'price' => 250.00,
            'fuel' => 1,
        ]);
        DB::table('fuelschemes')->insert([
            'end_at' => 1000.00,
            'price' => 300.00,
            'fuel' => 1,
        ]);
        DB::table('fuelschemes')->insert([
            'end_at' => 10000.00,
            'price' => 500.00,
            'fuel' => 1,
        ]);

        DB::table('fuelschemes')->insert([
            'end_at' => 25.00,
            'price' => 130.00,
            'fuel' => 2,
        ]);
        DB::table('fuelschemes')->insert([
            'end_at' => 50.00,
            'price' => 160.00,
            'fuel' => 2,
        ]);
        DB::table('fuelschemes')->insert([
            'end_at' => 100.00,
            'price' => 175.00,
            'fuel' => 2,
        ]);
        DB::table('fuelschemes')->insert([
            'end_at' => 200.00,
            'price' => 250.00,
            'fuel' => 2,
        ]);
        DB::table('fuelschemes')->insert([
            'end_at' => 500.00,
            'price' => 350.00,
            'fuel' => 2,
        ]);
        DB::table('fuelschemes')->insert([
            'end_at' => 1000.00,
            'price' => 500.00,
            'fuel' => 2,
        ]);
        DB::table('fuelschemes')->insert([
            'end_at' => 10000.00,
            'price' => 1000.00,
            'fuel' => 2,
        ]);
    }
}
