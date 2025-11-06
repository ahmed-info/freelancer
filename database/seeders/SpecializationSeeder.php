<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Specialization;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $specializations = [
            ['id' => 1, 'name' => 'تكنولوجيا المعلومات'],
            ['id' => 2, 'name' => 'المالية والمحاسبة'],
            ['id' => 3, 'name' => 'الهندسة'],
            ['id' => 4, 'name' => 'الموارد البشرية'],
            ['id' => 5, 'name' => 'التسويق والمبيعات'],
            ['id' => 6, 'name' => 'الرعاية الصحية'],
            ['id' => 7, 'name' => 'التعليم'],
            ['id' => 8, 'name' => 'القانون'],
            ['id' => 9, 'name' => 'الإدارة'],
            ['id' => 10, 'name' => 'الخدمات'],
            ['id' => 11, 'name' => 'الفنون والتصميم'],
            ['id' => 12, 'name' => 'العلوم والبحث'],
            ['id' => 13, 'name' => 'الضيافة والسياحة'],
            ['id' => 14, 'name' => 'الزراعة والبيئة'],
            ['id' => 15, 'name' => 'اللوجستيات والنقل'],
            ['id' => 16, 'name' => 'الإعلام والاتصال'],
            ['id' => 17, 'name' => 'الطيران والفضاء'],
            ['id' => 18, 'name' => 'الطاقة والمياه'],
            ['id' => 19, 'name' => 'الرياضة والترفيه'],
            ['id' => 20, 'name' => 'العقارات والتطوير العمراني'],
            ['id' => 21, 'name' => 'علم النفس والخدمة الاجتماعية'],
            ['id' => 22, 'name' => 'التجارة الإلكترونية'],
            ['id' => 23, 'name' => 'الذكاء الاصطناعي والروبوتات'],
            ['id' => 24, 'name' => 'العلوم الإدارية والتخطيط'],
            ['id' => 25, 'name' => 'اللغات والترجمة'],
            ['id' => 26, 'name' => 'البيانات الضخمة والتحليلات'],
            ['id' => 27, 'name' => 'الأمن والسلامة'],
            ['id' => 28, 'name' => 'الفنون الأدائية'],
            ['id' => 29, 'name' => 'التصنيع والإنتاج'],
            ['id' => 30, 'name' => 'الاستشارات والإدارة'],
            ['id' => 31, 'name' => 'الطب التكميلي والبديل'],
            ['id' => 32, 'name' => 'التقنية المالية (FinTech)'],
            ['id' => 33, 'name' => 'البيئة والاستدامة'],
            ['id' => 34, 'name' => 'الواقع الافتراضي والمعزز'],
            ['id' => 35, 'name' => 'الاقتصاد والإحصاء'],
        ];

        foreach ($specializations as $specialization) {
            Specialization::create($specialization);
        }
    }
}
