<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            // Lập trình
            'PHP', 'Laravel', 'Python', 'Java', 'JavaScript', 'TypeScript',
            'C#', 'C++', 'Go', 'Ruby', 'Swift', 'Kotlin',

            // Frontend
            'HTML', 'CSS', 'ReactJS', 'VueJS', 'Angular', 'Tailwind CSS',
            'Bootstrap', 'jQuery', 'NextJS', 'NuxtJS',

            // Backend
            'NodeJS', 'Express', 'Django', 'Spring Boot', 'ASP.NET',
            'FastAPI', 'Livewire',

            // Database
            'MySQL', 'PostgreSQL', 'MongoDB', 'Redis', 'SQLite',
            'SQL Server', 'Elasticsearch',

            // DevOps / Cloud
            'Docker', 'Kubernetes', 'AWS', 'Azure', 'Google Cloud',
            'CI/CD', 'Git', 'Linux', 'Nginx',

            // Mobile
            'React Native', 'Flutter', 'Android', 'iOS',

            // Data / AI
            'Machine Learning', 'Deep Learning', 'Data Analysis',
            'TensorFlow', 'PyTorch', 'Pandas', 'Power BI', 'Tableau',

            // Khác
            'RESTful API', 'GraphQL', 'Microservices', 'Agile', 'Scrum',
            'UI/UX Design', 'Figma', 'Photoshop', 'Excel', 'Word',
            'Tiếng Anh', 'Quản lý dự án', 'Giao tiếp', 'Làm việc nhóm',
        ];

        $data = array_map(fn($name) => ['name' => $name], $skills);

        DB::table('skills')->insertOrIgnore($data);
    }
}
