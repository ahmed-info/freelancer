<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SpecializationsAndMyjobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = database_path('data/specializations.json');

        $json = file_get_contents($jsonPath);
        $specializations = json_decode($json, true);

        foreach ($specializations['specializations'] as $specData) {
            // إدخال أو تحديث التخصص
            DB::table('specializations')->updateOrInsert(
                ['id' => $specData['id']],
                ['name' => $specData['name']]
            );

            // إدخال الوظائف
            foreach ($specData['myjobs'] as $jobName) {
                DB::table('myjobs')->updateOrInsert(
                    ['name' => $jobName, 'specialization_id' => $specData['id']]
                );
            }
        }
    }
}
