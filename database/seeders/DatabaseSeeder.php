<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ProjectSeeder;
use Database\Seeders\SpecializationSeeder;
use Database\Seeders\MyJobSeeder;
use Database\Seeders\SpecializationsAndMyjobsSeeder;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Ahmed',
        //     'email' => 'ahmed.razzaq.yahya@gmail.com',
        //     'password' => bcrypt('123456aa'),
        //     'role' => 'project',
        // ]);
        $this->call(ProjectSeeder::class);
        // $this->call(SpecializationSeeder::class);
        // $this->call(MyJobSeeder::class);
        //$this->call(SpecializationsAndMyjobsSeeder::class);
    }
}
