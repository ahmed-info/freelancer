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
        $projects = [
            [
                'title' => 'تطبيق جوال للمطاعم',
                'description' => 'تطبيق يسمح للعملاء بحجز طاولات وطلب الطعام عبر الهاتف',
                'budget_amount' => 8000.00,
                'hourly_rate' => 40.00,
                'weekly_hours' => '25',
                'duration' => '2-3',
                'skills' => ['تطوير تطبيقات', 'UI/UX', 'Firebase']
            ],
            [
                'title' => 'منصة تعليمية إلكترونية',
                'description' => 'بناء نظام إدارة تعلم عبر الإنترنت مع فصول افتراضية',
                'budget_amount' => 12000.00,
                'hourly_rate' => 35.00,
                'weekly_hours' => '30',
                'duration' => '3-6',
                'skills' => ['Laravel', 'Vue.js', 'WebRTC']
            ],
            [
                'title' => 'نظام إدارة المخزون',
                'description' => 'تطوير نظام متكامل لإدارة المخزون والمبيعات',
                'budget_amount' => 6000.00,
                'hourly_rate' => 45.00,
                'weekly_hours' => '20',
                'duration' => '1-4',
                'skills' => ['PHP', 'MySQL', 'JavaScript']
            ],
            [
                'title' => 'موقع سياحي تفاعلي',
                'description' => 'تصميم منصة لعرض الرحلات السياحية والحجوزات',
                'budget_amount' => 7500.00,
                'hourly_rate' => 50.00,
                'weekly_hours' => '25',
                'duration' => '2-4',
                'skills' => ['تصميم ويب', 'React', 'Node.js']
            ],
            [
                'title' => 'تطبيق توصيل طلبات',
                'description' => 'تطبيق يربط المطاعم بعملاء التوصيل',
                'budget_amount' => 15000.00,
                'hourly_rate' => 55.00,
                'weekly_hours' => '35',
                'duration' => '3-5',
                'skills' => ['Flutter', 'خرائط Google', 'دفع إلكتروني']
            ],
            [
                'title' => 'متجر إلكتروني للملابس',
                'description' => 'إنشاء متجر إلكتروني متكامل مع نظام دفع وإدارة طلبات',
                'budget_amount' => 5000.00,
                'hourly_rate' => 40.00,
                'weekly_hours' => '20',
                'duration' => '1-3',
                'skills' => ['WooCommerce', 'تصميم متاجر', 'SEO']
            ],
            [
                'title' => 'نظام حجز مواعيد',
                'description' => 'منظمة لجدولة مواعيد العملاء في العيادات',
                'budget_amount' => 4000.00,
                'hourly_rate' => 30.00,
                'weekly_hours' => '15',
                'duration' => '1-2',
                'skills' => ['PHP', 'JavaScript', 'Bootstrap']
            ],
            [
                'title' => 'تطبيق لياقة بدنية',
                'description' => 'تطبيق لمتابعة التمارين الرياضية والتغذية',
                'budget_amount' => 10000.00,
                'hourly_rate' => 60.00,
                'weekly_hours' => '30',
                'duration' => '3-4',
                'skills' => ['React Native', 'تطبيقات صحية', 'API']
            ],
            [
                'title' => 'بوابة حكومية إلكترونية',
                'description' => 'تطوير بوابة لخدمات الحكومة الإلكترونية',
                'budget_amount' => 20000.00,
                'hourly_rate' => 65.00,
                'weekly_hours' => '40',
                'duration' => '4-6',
                'skills' => ['أمن المعلومات', 'Java', 'قواعد بيانات']
            ],
            [
                'title' => 'منصة تواصل اجتماعي',
                'description' => 'شبكة اجتماعية متخصصة للفنانين',
                'budget_amount' => 18000.00,
                'hourly_rate' => 45.00,
                'weekly_hours' => '35',
                'duration' => '4-8',
                'skills' => ['Real-time', 'WebSockets', 'MongoDB']
            ],
            [
                'title' => 'نظام محاسبة للشركات',
                'description' => 'برنامج متكامل لإدارة الحسابات والمصاريف',
                'budget_amount' => 9000.00,
                'hourly_rate' => 55.00,
                'weekly_hours' => '25',
                'duration' => '2-5',
                'skills' => ['C#', '.NET', 'SQL Server']
            ],
            [
                'title' => 'موقع عقارات',
                'description' => 'منصة لعرض العقارات وتنظيم الزيارات',
                'budget_amount' => 7000.00,
                'hourly_rate' => 35.00,
                'weekly_hours' => '20',
                'duration' => '2-3',
                'skills' => ['Laravel', 'Vue.js', 'Google Maps']
            ],
            [
                'title' => 'تطبيق توصيل بقالة',
                'description' => 'تطبيق لطلب البقالة المنزلية بالتوصيل',
                'budget_amount' => 12000.00,
                'hourly_rate' => 50.00,
                'weekly_hours' => '30',
                'duration' => '3-4',
                'skills' => ['Android', 'iOS', 'إدارة طلبات']
            ],
            [
                'title' => 'منظمة فعاليات افتراضية',
                'description' => 'منصة لإدارة المؤتمرات والندوات عبر الإنترنت',
                'budget_amount' => 11000.00,
                'hourly_rate' => 40.00,
                'weekly_hours' => '25',
                'duration' => '2-4',
                'skills' => ['Zoom API', 'فيديو', 'إدارة محتوى']
            ],
            [
                'title' => 'نظام متابعة المركبات',
                'description' => 'تطبيق لتتبع أسطول المركبات وإستهلاك الوقود',
                'budget_amount' => 8500.00,
                'hourly_rate' => 45.00,
                'weekly_hours' => '20',
                'duration' => '2-3',
                'skills' => ['GPS', 'خرائط', 'تطبيقات enterprise']
            ]
        ];

        $user = User::first();

        foreach ($projects as $project) {
            Project::create([
                'title' => $project['title'],
                'description' => $project['description'],
                'budget_amount' => $project['budget_amount'],
                //'hourly_rate' => $project['hourly_rate'],
                //'weekly_hours' => $project['weekly_hours'],
                'duration' => $project['duration'],
                'user_id' => $user->id,
                'status' => 'published',
                'skills' => json_encode($project['skills']),
                'freelancer_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
