<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;
use App\Models\Job;
use Illuminate\Support\Facades\DB;

class JobSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $map = [
            [
                'title'   => 'Kỹ sư Nông nghiệp Công nghệ cao',
                'company' => 'Công ty Vineco',
                'skills'  => ['Python', 'Data Analysis', 'IoT', 'SQL Server'],
            ],
            [
                'title'   => 'Lập trình viên Backend PHP',
                'company' => 'FPT Software',
                'skills'  => ['PHP', 'Laravel', 'MySQL', 'RESTful API', 'Git'],
            ],
            [
                'title'   => 'Chuyên viên Phân tích Dữ liệu',
                'company' => 'TH True Milk',
                'skills'  => ['Python', 'Pandas', 'Power BI', 'SQL Server', 'Data Analysis'],
            ],
            [
                'title'   => 'Thực tập sinh Kỹ thuật Môi trường',
                'company' => 'Viện Khoa học Nông nghiệp VN',
                'skills'  => ['Excel', 'Word', 'Data Analysis'],
            ],
            [
                'title'   => 'Kỹ sư Phần mềm Frontend',
                'company' => 'VNG Corporation',
                'skills'  => ['JavaScript', 'ReactJS', 'VueJS', 'HTML', 'CSS', 'Tailwind CSS'],
            ],
            [
                'title'   => 'Chuyên viên Marketing Nông sản',
                'company' => 'Dabaco Group',
                'skills'  => ['Giao tiếp', 'Quản lý dự án', 'Excel', 'Làm việc nhóm'],
            ],
            [
                'title'   => 'Lập trình viên Mobile (React Native)',
                'company' => 'VCCorp',
                'skills'  => ['JavaScript', 'React Native', 'TypeScript', 'Git'],
            ],
            [
                'title'   => 'DevOps Engineer',
                'company' => 'Viettel Digital',
                'skills'  => ['Docker', 'Kubernetes', 'CI/CD', 'AWS', 'Linux', 'Git'],
            ],
            [
                'title'   => 'Thực tập sinh Lập trình Laravel',
                'company' => 'Toàn Cầu Tech',
                'skills'  => ['PHP', 'Laravel', 'MySQL', 'Git', 'HTML', 'CSS'],
            ],
            [
                'title'   => 'Nhân viên Phân tích Tín dụng',
                'company' => 'AgriBank',
                'skills'  => ['Excel', 'Data Analysis', 'Giao tiếp', 'Quản lý dự án'],
            ],
            [
                'title'   => 'Kỹ sư Dữ liệu (Data Engineer)',
                'company' => 'FPT Software',
                'skills'  => ['Python', 'SQL Server', 'PostgreSQL', 'Docker', 'Data Analysis'],
            ],
            [
                'title'   => 'Remote Frontend Developer (NextJS)',
                'company' => 'Toàn Cầu Tech',
                'skills'  => ['ReactJS', 'NextJS', 'TypeScript', 'Tailwind CSS', 'Git'],
            ],
        ];
 
        foreach ($map as $item) {
            $job = Job::where('title', $item['title'])
                ->where('company', $item['company'])
                ->first();
 
            if (! $job) {
                $this->command->warn("✗ Không tìm thấy job: {$item['title']} - {$item['company']}");
                continue;
            }
 
            $skillIds = Skill::whereIn('name', $item['skills'])->pluck('id', 'name');
 
            $ids = [];
            foreach ($item['skills'] as $name) {
                if (isset($skillIds[$name])) {
                    $ids[] = $skillIds[$name];
                } else {
                    $this->command->warn("  ⚠ Skill không tồn tại: {$name}");
                }
            }
 
            $job->skills()->syncWithoutDetaching($ids);
 
            $this->command->info("✓ {$item['title']} (#{$job->id}): " . count($ids) . ' skills');
        }
    }
}
