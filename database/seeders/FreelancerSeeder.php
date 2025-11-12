<?php

namespace Database\Seeders;

use App\Models\Freelancer;
use App\Models\Project;
use App\Models\Review;
use App\Models\Service;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;

class FreelancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إنشاء المهارات
        $skills = [
            'HTML', 'CSS', 'JavaScript', 'React', 'Vue.js',
            'Bootstrap', 'Tailwind CSS', 'jQuery', 'PHP', 'Laravel',
            'Node.js', 'Python', 'Django', 'MySQL', 'MongoDB'
        ];

        $skillModels = [];
        foreach ($skills as $skill) {
            $skillModels[] = Skill::create([
                'name' => $skill
               // 'slug' => \Str::slug($skill)
            ]);
        }

        // إنشاء مستخدمين ومستقلين
        for ($i = 1; $i <= 10; $i++) {
            // إنشاء المستخدم
            $user = User::create([
                'name' => "مستقل {$i}",
                'email' => "freelancer{$i}@example.com",
                'password' => bcrypt('password'),
            ]);

            // إنشاء بروفايل المستقل
            $freelancer = Freelancer::create([
                'user_id' => $user->id,
                'title' => 'مطور واجهات أمامية | Frontend Developer',
                'bio' => 'مطور واجهات أمامية بخبرة تزيد عن 5 سنوات في مجال تطوير الويب. متخصص في تطوير واجهات المستخدم باستخدام React.js و Vue.js. أحب العمل على مشاريع مبتكرة وأحرص على تقديم أعلى معايير الجودة في العمل.',
                'country' => ['مصر', 'السعودية', 'الإمارات', 'الأردن'][rand(0, 3)],
                'member_since' => rand(2018, 2024),
                'is_verified' => rand(0, 1),
                'is_online' => rand(0, 1),
                'response_rate' => rand(85, 100),
                'response_time' => rand(30, 240), // بالدقائق
                'on_time_delivery' => rand(90, 100),
                'rehire_rate' => rand(75, 95),
                'rating' => rand(40, 50) / 10, // من 4.0 إلى 5.0
                'reviews_count' => rand(50, 200),
                'projects_count' => rand(20, 100),
            ]);

            // ربط المهارات العشوائية
            $randomSkills = collect($skillModels)->random(rand(5, 10));
            $freelancer->skills()->attach($randomSkills->pluck('id'));

            // إنشاء الخدمات
            $services = [
                ['title' => 'تطوير واجهة موقع إلكتروني', 'price' => 500, 'days' => 5],
                ['title' => 'تصميم متجاوب باستخدام Bootstrap', 'price' => 300, 'days' => 3],
                ['title' => 'تطوير تطبيق ويب باستخدام React', 'price' => 800, 'days' => 7],
                ['title' => 'تحسين أداء الموقع', 'price' => 200, 'days' => 2],
                ['title' => 'تصميم صفحة هبوط احترافية', 'price' => 400, 'days' => 4],
            ];

            foreach ($services as $service) {
                Service::create([
                    'freelancer_id' => $freelancer->id,
                    'title' => $service['title'],
                    'description' => 'وصف الخدمة هنا...',
                    'price' => $service['price'],
                    'delivery_days' => $service['days'],
                    'is_active' => true,
                    'rating' => rand(40, 50) / 10,
                ]);
            }

            // إنشاء عملاء ومشاريع
            for ($j = 1; $j <= 5; $j++) {
                $client = User::create([
                    'name' => "عميل {$i}-{$j}",
                    'email' => "client{$i}{$j}@example.com",
                    'password' => bcrypt('password'),
                ]);

                $project = Project::create([
                    'freelancer_id' => $freelancer->id,
                    'user_id' => $client->id,
                    'title' => ['موقع تجارة إلكترونية', 'تطبيق إدارة المهام', 'منصة تعليمية', 'موقع شركة'][rand(0, 3)],
                    'description' => 'وصف المشروع هنا...',
                    //'client_name' => ['شركة التقنية', 'مؤسسة النجاح', 'أكاديمية البرمجة', 'شركة السياحة'][rand(0, 3)],
                    'budget_amount' => rand(500, 2000),
                    'duration' => rand(1, 5) . ' أسابيع',
                    'status' => 'completed',
                    'rating' => rand(40, 50) / 10,
                    'completed_at' => now()->subDays(rand(30, 180)),
                ]);

                // إنشاء تقييم للمشروع
                Review::create([
                    'freelancer_id' => $freelancer->id,
                    'project_id' => $project->id,
                    'user_id' => $client->id,
                    'rating' => $project->rating,
                    'comment' => [
                        'عمل رائع ومتقن، التزم بالوقت وكان التواصل سلساً. أنصح بالتعامل معه',
                        'مطور محترف، فهم المتطلبات بدقة وأنهى العمل قبل الوقت المحدد',
                        'تجربة جيدة، العمل كان متقناً ولكن تأخر قليلاً في التسليم',
                        'ممتاز في التنفيذ وسريع في الاستجابة، سأتعامل معه مرة أخرى',
                    ][rand(0, 3)],
                ]);
            }
        }
    }
}
