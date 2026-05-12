<?php

namespace Database\Seeders;
use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            [
                'title'       => 'Kỹ sư Nông nghiệp Công nghệ cao',
                'company'     => 'Công ty Vineco',
                'location'    => 'Hà Nội',
                'type'        => 'full-time',
                'field'       => 'Nông nghiệp',
                'salary'      => '12–18 tr',
                
            ],
            [
                'title'       => 'Lập trình viên Backend PHP',
                'company'     => 'FPT Software',
                'location'    => 'Hà Nội',
                'type'        => 'full-time',
                'field'       => 'Công nghệ',
                'salary'      => '18–30 tr',
               
            ],
            [
                'title'       => 'Chuyên viên Phân tích Dữ liệu',
                'company'     => 'TH True Milk',
                'location'    => 'Nghệ An',
                'type'        => 'full-time',
                'field'       => 'Thực phẩm',
                'salary'      => '15–22 tr',
                
            ],
            [
                'title'       => 'Thực tập sinh Kỹ thuật Môi trường',
                'company'     => 'Viện Khoa học Nông nghiệp VN',
                'location'    => 'Hà Nội',
                'type'        => 'internship',
                'field'       => 'Môi trường',
                'salary'      => '3–5 tr',
                
            ],
            [
                'title'       => 'Kỹ sư Phần mềm Frontend',
                'company'     => 'VNG Corporation',
                'location'    => 'Hà Nội',
                'type'        => 'full-time',
                'field'       => 'Công nghệ',
                'salary'      => '20–35 tr',
               
            ],
            [
                'title'       => 'Chuyên viên Marketing Nông sản',
                'company'     => 'Dabaco Group',
                'location'    => 'Bắc Ninh',
                'type'        => 'full-time',
                'field'       => 'Marketing',
                'salary'      => '10–15 tr',
                
            ],
        ];
 
        foreach ($jobs as $item) {
            Job::firstOrCreate(['title' => $item['title'], 'company' => $item['company']], $item);
        }
    }
}
