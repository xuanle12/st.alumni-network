<?php

namespace Database\Seeders;
use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Skill;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            [
                'title'                => 'Kỹ sư Nông nghiệp Công nghệ cao',
                'company'              => 'Công ty Vineco',
                'location'             => 'Hà Nội',
                'type'                 => 'full-time',
                'field'                => 'Nông nghiệp',
                'khoa'                 => 'Công nghệ Thông tin',
                'min_salary'           => 12,
                'max_salary'           => 18,
                'experience_required'  => 1,
                'deadline'             => '2026-08-30',
                'description'          => 'Tham gia phát triển và quản lý hệ thống IoT giám sát nông nghiệp công nghệ cao, phân tích dữ liệu cảm biến và tối ưu quy trình canh tác.',
                'skills'               => ['Python', 'Data Analysis', 'IoT', 'SQL Server'],
            ],
            [
                'title'                => 'Lập trình viên Backend PHP',
                'company'              => 'FPT Software',
                'location'             => 'Hà Nội',
                'type'                 => 'full-time',
                'field'                => 'Công nghệ',
                'khoa'                 => 'Công nghệ Thông tin',
                'min_salary'           => 18,
                'max_salary'           => 30,
                'experience_required'  => 1,
                'deadline'             => '2026-09-15',
                'description'          => 'Phát triển và bảo trì hệ thống backend sử dụng Laravel, xây dựng RESTful API phục vụ các ứng dụng web và mobile.',
                'skills'               => ['PHP', 'Laravel', 'MySQL', 'RESTful API', 'Git'],
            ],
            [
                'title'                => 'Chuyên viên Phân tích Dữ liệu',
                'company'              => 'TH True Milk',
                'location'             => 'Nghệ An',
                'type'                 => 'full-time',
                'field'                => 'Thực phẩm',
                'khoa'                 => 'Công nghệ Thông tin',
                'min_salary'           => 15,
                'max_salary'           => 22,
                'experience_required'  => 2,
                'deadline'             => '2026-08-20',
                'description'          => 'Thu thập, xử lý và phân tích dữ liệu sản xuất - kinh doanh, xây dựng báo cáo và dashboard hỗ trợ ra quyết định.',
                'skills'               => ['Python', 'Pandas', 'Power BI', 'SQL Server', 'Data Analysis'],
            ],
            [
                'title'                => 'Thực tập sinh Kỹ thuật Môi trường',
                'company'              => 'Viện Khoa học Nông nghiệp VN',
                'location'             => 'Hà Nội',
                'type'                 => 'internship',
                'field'                => 'Môi trường',
                'khoa'                 => 'Công nghệ Thông tin',
                'min_salary'           => 3,
                'max_salary'           => 5,
                'experience_required'  => 0,
                'deadline'             => '2026-07-31',
                'description'          => 'Hỗ trợ thu thập số liệu môi trường, nhập liệu và xử lý báo cáo bằng Excel, hỗ trợ nghiên cứu khoa học.',
                'skills'               => ['Excel', 'Word', 'Data Analysis'],
            ],
            [
                'title'                => 'Kỹ sư Phần mềm Frontend',
                'company'              => 'VNG Corporation',
                'location'             => 'Hà Nội',
                'type'                 => 'full-time',
                'field'                => 'Công nghệ',
                'khoa'                 => 'Công nghệ Thông tin',
                'min_salary'           => 20,
                'max_salary'           => 35,
                'experience_required'  => 2,
                'deadline'             => '2026-09-30',
                'description'          => 'Xây dựng giao diện người dùng hiện đại với ReactJS/VueJS, làm việc cùng team thiết kế UI/UX để tạo sản phẩm chất lượng cao.',
                'skills'               => ['JavaScript', 'ReactJS', 'VueJS', 'HTML', 'CSS', 'Tailwind CSS'],
            ],
            [
                'title'                => 'Chuyên viên Marketing Nông sản',
                'company'              => 'Dabaco Group',
                'location'             => 'Bắc Ninh',
                'type'                 => 'full-time',
                'field'                => 'Marketing',
                'khoa'                 => 'Công nghệ Thông tin',
                'min_salary'           => 10,
                'max_salary'           => 15,
                'experience_required'  => 1,
                'deadline'             => '2026-08-10',
                'description'          => 'Xây dựng và triển khai chiến lược marketing cho các sản phẩm nông sản, quản lý kênh truyền thông và sự kiện quảng bá thương hiệu.',
                'skills'               => ['Giao tiếp', 'Quản lý dự án', 'Excel', 'Làm việc nhóm'],
            ],
            [
                'title'                => 'Lập trình viên Mobile (React Native)',
                'company'              => 'VCCorp',
                'location'             => 'Hà Nội',
                'type'                 => 'full-time',
                'field'                => 'Công nghệ',
                'khoa'                 => 'Công nghệ Thông tin',
                'min_salary'           => 18,
                'max_salary'           => 28,
                'experience_required'  => 1,
                'deadline'             => '2026-09-01',
                'description'          => 'Phát triển ứng dụng di động đa nền tảng bằng React Native, tối ưu hiệu năng và trải nghiệm người dùng.',
                'skills'               => ['JavaScript', 'React Native', 'TypeScript', 'Git'],
            ],
            [
                'title'                => 'DevOps Engineer',
                'company'              => 'Viettel Digital',
                'location'             => 'Hà Nội',
                'type'                 => 'full-time',
                'field'                => 'Công nghệ',
                'khoa'                 => 'Công nghệ Thông tin',
                'min_salary'           => 25,
                'max_salary'           => 40,
                'experience_required'  => 3,
                'deadline'             => '2026-10-01',
                'description'          => 'Thiết kế, triển khai và vận hành hệ thống CI/CD, quản trị hạ tầng cloud và container hóa ứng dụng.',
                'skills'               => ['Docker', 'Kubernetes', 'CI/CD', 'AWS', 'Linux', 'Git'],
            ],
            [
                'title'                => 'Thực tập sinh Lập trình Laravel',
                'company'              => 'Toàn Cầu Tech',
                'location'             => 'Hà Nội',
                'type'                 => 'internship',
                'field'                => 'Công nghệ',
                'khoa'                 => 'Công nghệ Thông tin',
                'min_salary'           => 2,
                'max_salary'           => 4,
                'experience_required'  => 0,
                'deadline'             => '2026-07-20',
                'description'          => 'Tham gia phát triển các module ứng dụng web bằng Laravel, học hỏi quy trình làm việc thực tế tại doanh nghiệp.',
                'skills'               => ['PHP', 'Laravel', 'MySQL', 'Git', 'HTML', 'CSS'],
            ],
            [
                'title'                => 'Nhân viên Phân tích Tín dụng',
                'company'              => 'AgriBank',
                'location'             => 'Hà Nội',
                'type'                 => 'full-time',
                'field'                => 'Tài chính',
                'khoa'                 => 'Kinh tế',
                'min_salary'           => 12,
                'max_salary'           => 20,
                'experience_required'  => 1,
                'deadline'             => '2026-08-25',
                'description'          => 'Thẩm định và phân tích hồ sơ tín dụng khách hàng, lập báo cáo phân tích rủi ro tài chính.',
                'skills'               => ['Excel', 'Data Analysis', 'Giao tiếp', 'Quản lý dự án'],
            ],
            [
                'title'                => 'Kỹ sư Dữ liệu (Data Engineer)',
                'company'              => 'FPT Software',
                'location'             => 'TP. Hồ Chí Minh',
                'type'                 => 'part-time',
                'field'                => 'Công nghệ',
                'khoa'                 => 'Công nghệ Thông tin',
                'min_salary'           => 1,
                'max_salary'           => 3,
                'experience_required'  => 0,
                'deadline'             => '2026-09-20',
                'description'          => 'Xây dựng pipeline xử lý dữ liệu lớn, thiết kế kho dữ liệu và tối ưu hiệu năng truy vấn cho hệ thống phân tích.',
                'skills'               => ['Python', 'SQL Server', 'PostgreSQL', 'Docker', 'Data Analysis'],
            ],
            [
                'title'                => 'Remote Frontend Developer (NextJS)',
                'company'              => 'Toàn Cầu Tech',
                'location'             => 'Remote',
                'type'                 => 'remote',
                'field'                => 'Công nghệ',
                'khoa'                 => 'Công nghệ Thông tin',
                'min_salary'           => 20,
                'max_salary'           => 32,
                'experience_required'  => 2,
                'deadline'             => '2026-09-10',
                'description'          => 'Phát triển ứng dụng web với NextJS và TypeScript, làm việc remote linh hoạt với team quốc tế.',
                'skills'               => ['ReactJS', 'NextJS', 'TypeScript', 'Tailwind CSS', 'Git'],
            ],
        ];

        $admin = User::where('role', 'admin')->first();

        foreach ($jobs as $item) {
            $skillNames = $item['skills'] ?? [];
            unset($item['skills']);

            $item['created_by'] = $item['created_by'] ?? $admin?->id;
            $item['is_active'] = $item['is_active'] ?? true;

            $job = Job::updateOrCreate(
                ['title' => $item['title'], 'company' => $item['company']],
                $item
            );

            if (!empty($skillNames)) {
                $skillIds = Skill::whereIn('name', $skillNames)->pluck('id', 'name');
                $ids = [];
                foreach ($skillNames as $name) {
                    if (isset($skillIds[$name])) {
                        $ids[] = $skillIds[$name];
                    }
                }
                $job->skills()->syncWithoutDetaching($ids);
            }
        }

        $this->command->info('✓ Đã seed ' . count($jobs) . ' thành công!');
    
    }
}
