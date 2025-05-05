<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            'DevOps Engineer',
            'Linux Redhat I II',
            'AWS Cloud Practitioner',
            'Microsoft Cloud - Azure Fundamentals Diploma [AZ-900]',
            'CCNA 200-301',
            'Cisco Networking Automation',
            'DevSecOps Engineer',
            'AI Engineer',
            'Data Scientist',
            'Data Analyst',
            'IT Preparation Package',
            'Web Frontend React',
            'Web Backend PHP Laravel',
            'Flutter Mobile Applications',
            'Python Web DJango',
            'OpenShift platform Engineer',
            'DevOps WorkShop - 15 projects',
            'Data Engineer',
            'Kafka Messaging',
        ];

        foreach ($courses as $course) {
            DB::table('courses')->insert([
                'course_name' => $course,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
