<?php

namespace Database\Seeders;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            // 'id' => Str::uuid()->toString(),
            'name' => 'Admin',
            'phone' => '01002125222',
            'role' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret'),
        ]);
    }
}
