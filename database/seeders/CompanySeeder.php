<?php

namespace Database\Seeders;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name'             => 'FPT Software',
                'field'            => 'CNTT',
                'website'          => 'https://fpt.com.vn',
                'size'             => '1000+',
                'address'          => '17 Duy Tân, Cầu Giấy, Hà Nội',
                'description'      => 'Công ty phần mềm hàng đầu Việt Nam, chuyên cung cấp giải pháp CNTT cho thị trường trong và ngoài nước.',
                'contact_name'     => 'Nguyễn Thị Hương',
                'contact_position' => 'HR Manager',
                'contact_email'    => 'hr@fpt.com.vn',
                'contact_phone'    => '024 3737 0011',
                'status'           => 'active',
            ],
            [
                'name'             => 'VCCorp',
                'field'            => 'CNTT',
                'website'          => 'https://vccorp.vn',
                'size'             => '201-1000',
                'address'          => 'Cầu Giấy, Hà Nội',
                'description'      => 'Tập đoàn công nghệ truyền thông lớn tại Việt Nam.',
                'contact_name'     => 'Trần Thị Linh',
                'contact_position' => 'Talent Acquisition',
                'contact_email'    => 'recruit@vccorp.vn',
                'contact_phone'    => '024 3993 3388',
                'status'           => 'active',
            ],
            [
                'name'             => 'Viettel Digital',
                'field'            => 'CNTT',
                'website'          => 'https://viettel.vn',
                'size'             => '1000+',
                'address'          => 'Số 1 Giang Văn Minh, Hà Nội',
                'description'      => 'Công ty công nghệ số của Tập đoàn Viettel.',
                'contact_name'     => 'Lê Văn Minh',
                'contact_position' => 'HR Director',
                'contact_email'    => 'digital.hr@viettel.vn',
                'contact_phone'    => '04 6282 8282',
                'status'           => 'active',
            ],
            [
                'name'             => 'Toàn Cầu Tech',
                'field'            => 'CNTT',
                'website'          => '',
                'size'             => '51-200',
                'address'          => 'Đống Đa, Hà Nội',
                'description'      => 'Công ty phát triển phần mềm cho doanh nghiệp vừa và nhỏ.',
                'contact_name'     => 'Phạm Văn Đức',
                'contact_position' => 'CEO',
                'contact_email'    => 'pvduc@toancautech.vn',
                'contact_phone'    => '0912 345 678',
                'status'           => 'pending',
                'admin_note'       => 'Đang xét duyệt hồ sơ',
            ],
            [
                'name'             => 'AgriBank',
                'field'            => 'Tài chính',
                'website'          => 'https://agribank.com.vn',
                'size'             => '1000+',
                'address'          => '2 Láng Hạ, Đống Đa, Hà Nội',
                'description'      => 'Ngân hàng Nông nghiệp và Phát triển Nông thôn Việt Nam.',
                'contact_name'     => 'Hoàng Thị Mai',
                'contact_position' => 'HR Manager',
                'contact_email'    => 'tuyendung@agribank.com.vn',
                'contact_phone'    => '024 3831 8100',
                'status'           => 'active',
            ],
        ];
 
        foreach ($companies as $c) {
            Company::create($c);
        }
    }
}
