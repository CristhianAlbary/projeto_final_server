<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'nome' => 'Cristhian',
            'login' => 'cristhian',
            'password' => bcrypt('cristhian'),
            'status' => 'A',
            'tipo' => 'USU',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'nome' => 'Admin',
            'login' => 'admin',
            'password' => bcrypt('admin'),
            'status' => 'A',
            'tipo' => 'SUP',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
