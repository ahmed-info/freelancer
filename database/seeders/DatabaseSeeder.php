<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ProjectSeeder;
use Database\Seeders\SpecializationSeeder;
use Database\Seeders\MyJobSeeder;
use Database\Seeders\SpecializationsAndMyjobsSeeder;
use Database\Seeders\FreelancerSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        // User::create([
        //     'name' => 'المسؤول',
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'admin'
        // ]);

        // User::create([
        //     'name' => 'مستقل 1',
        //     'email' => 'freelance1@example.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'freelance'
        // ]);

        // User::create([
        //     'name' => 'مشروع 1',
        //     'email' => 'project1@example.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'project'
        // ]);

        // User::create([
        //     'name' => 'شركة 1',
        //     'email' => 'company1@example.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'company'
        // ]);

        //$this->call(FreelancerSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(SpecializationsAndMyjobsSeeder::class);
    }
}
