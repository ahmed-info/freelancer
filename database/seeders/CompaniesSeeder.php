<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'company_name' => 'زين العراق',
                'business_field' => 'الاتصالات',
                'email' => 'info@iraq.zain.com',
                'phone' => '07800000000',
                'description' => 'شركة رائدة في مجال الاتصالات وتقديم خدمات الجوال والإنترنت',
                'terms_accepted' => true,
                'logo' => 'zain.png',
                'user_id' => 1
            ],
            [
                'company_name' => 'اسياسيل',
                'business_field' => 'الاتصالات',
                'email' => 'contact@asiacell.com',
                'phone' => '07900000000',
                'description' => 'إحدى أكبر شركات الاتصالات في العراق',
                'terms_accepted' => true,
                'logo' => 'asiacell.png',
                'user_id' => 1
            ],
            [
                'company_name' => 'كورك تelecom',
                'business_field' => 'الاتصالات',
                'email' => 'support@korektelecom.iq',
                'phone' => '07700000000',
                'description' => 'مزود خدمات اتصالات متنوعة',
                'terms_accepted' => true,
                'logo' => 'korek.png',
                'user_id' => 1
            ],
            [
                'company_name' => 'البنك المركزي العراقي',
                'business_field' => 'الخدمات المالية',
                'email' => 'info@cbi.iq',
                'phone' => '07810000000',
                'description' => 'البنك المركزي للعراق',
                'terms_accepted' => true,
                'logo' => 'cbi.png',
                'user_id' => 1
            ],
            [
                'company_name' => 'شركة نفط الشمال',
                'business_field' => 'النفط والغاز',
                'email' => 'noc@nonoil.iq',
                'phone' => '07710000000',
                'description' => 'شركة تعمل في مجال استكشاف وإنتاج النفط',
                'terms_accepted' => true,
                'logo' => 'nonoil.png',
                'user_id' => 1
            ],
            [
                'company_name' => 'العين للبناء',
                'business_field' => 'المقاولات',
                'email' => 'alain@construction.iq',
                'phone' => '07910000000',
                'description' => 'شركة مقاولات وإنشاءات',
                'terms_accepted' => true,
                'logo' => 'alain.png',
                'user_id' => 1
            ],
            [
                'company_name' => 'الراشدية',
                'business_field' => 'التجارة العامة',
                'email' => 'alrashedya@trade.iq',
                'phone' => '07820000000',
                'description' => 'شركة تجارية تعمل في مختلف المجالات',
                'terms_accepted' => true,
                'logo' => 'alrashedya.png',
                'user_id' => 1
            ],
            [
                'company_name' => 'بغداد للصناعات',
                'business_field' => 'الصناعة',
                'email' => 'baghdad@industries.iq',
                'phone' => '07720000000',
                'description' => 'شركة صناعية متنوعة الإنتاج',
                'terms_accepted' => true,
                'logo' => 'baghdad.png',
                'user_id' => 1
            ]
        ];

        foreach ($companies as $company) {
            DB::table('companies')->insert($company);
        }
    }
}
