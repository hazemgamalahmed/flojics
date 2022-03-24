<?php

namespace Database\Seeders;

use Database\Seeders\AdminSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Speciality;
use App\Models\Doctor;
use App\Models\Book;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
        User::factory(10)->create();
        Speciality::factory(10)->create();
        Doctor::factory(10)->create();
        // Book::factory(10)->create();
    }
}
