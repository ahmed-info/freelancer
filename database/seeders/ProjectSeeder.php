<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'تصميم موقع إلكتروني للشركة',
            'description' => 'نحن بحاجة إلى تصميم موقع إلكتروني حديث وجذاب لشركتنا.',
            'budget_type' => 'fixed',
            'budget_amount' => 5000.00,
            'hourly_rate' => 50.00,
            'weekly_hours' => '20',
            'duration' => '1-5',
            'user_id' => User::first()->id,
            'status' => 'published',
            'skills' => json_encode(['تصميم جرافيكي', 'تطوير ويب', 'تجربة المستخدم']),
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
}
