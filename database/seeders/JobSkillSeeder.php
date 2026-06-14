<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;
use Illuminate\Support\Facades\DB;

class JobSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $s = Skill::all()->keyBy('name');
 
        $map = [
            1  => ['Python', 'Data Analysis', 'SQL Server'],
            2  => ['PHP', 'Laravel', 'MySQL', 'RESTful API', 'Git'],
            3  => ['Python', 'Pandas', 'Power BI', 'SQL Server', 'Data Analysis'],
            4  => ['Excel', 'Word', 'Data Analysis'],
            5  => ['JavaScript', 'ReactJS', 'VueJS', 'HTML', 'CSS', 'Tailwind CSS'],
            6  => ['Giao tiếp', 'Quản lý dự án', 'Excel', 'Làm việc nhóm'],
            7  => ['JavaScript', 'React Native', 'TypeScript', 'Git'],
            8  => ['Docker', 'Kubernetes', 'CI/CD', 'AWS', 'Linux', 'Git'],
            9  => ['PHP', 'Laravel', 'MySQL', 'Git', 'HTML', 'CSS'],
            10 => ['Excel', 'Data Analysis', 'Giao tiếp', 'Quản lý dự án'],
            11 => ['Python', 'SQL Server', 'PostgreSQL', 'Docker', 'Data Analysis'],
            12 => ['ReactJS', 'NextJS', 'TypeScript', 'Tailwind CSS', 'Git'],
        ];
 
        foreach ($map as $jobId => $skillNames) {
            $rows = collect($skillNames)
                ->map(fn($name) => $s->get($name)?->id)
                ->filter()
                ->map(fn($skillId) => [
                    'job_id'     => $jobId,
                    'skill_id'   => $skillId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
                ->values()
                ->toArray();
 
            DB::table('job_skills')->insertOrIgnore($rows);
 
            $this->command->info("✓ job_id {$jobId}: " . count($rows) . " skills");
        }
    }
}
