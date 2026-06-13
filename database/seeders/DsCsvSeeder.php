<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DsCsvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
    ['msv' => '651001', 'ho_ten' => 'Nguyễn Văn Anh',      'lop' => 'CNTT01', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Công nghệ Phần mềm', 'nam_tot_nghiep' => 2024],
    ['msv' => '651002', 'ho_ten' => 'Trần Thị Bình',       'lop' => 'CNTT02', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Hệ thống Thông tin',  'nam_tot_nghiep' => 2024],
    ['msv' => '651003', 'ho_ten' => 'Lê Văn Cường',        'lop' => 'CNTT01', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Công nghệ Phần mềm', 'nam_tot_nghiep' => 2024],
    ['msv' => '651004', 'ho_ten' => 'Phạm Thị Dung',       'lop' => 'CNTT03', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Mạng máy tính',       'nam_tot_nghiep' => 2024],
    ['msv' => '651005', 'ho_ten' => 'Hoàng Văn Em',        'lop' => 'CNTT02', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Hệ thống Thông tin',  'nam_tot_nghiep' => 2024],
    ['msv' => '641001', 'ho_ten' => 'Vũ Thị Phương',       'lop' => 'CNTT04', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Công nghệ Phần mềm', 'nam_tot_nghiep' => 2023],
    ['msv' => '641002', 'ho_ten' => 'Đặng Văn Giang',      'lop' => 'CNTT01', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Mạng máy tính',       'nam_tot_nghiep' => 2023],
    ['msv' => '641003', 'ho_ten' => 'Bùi Thị Hoa',         'lop' => 'CNTT03', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Hệ thống Thông tin',  'nam_tot_nghiep' => 2023],
    ['msv' => '641004', 'ho_ten' => 'Ngô Văn Hùng',        'lop' => 'CNTT02', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Công nghệ Phần mềm', 'nam_tot_nghiep' => 2023],
    ['msv' => '641005', 'ho_ten' => 'Đinh Thị Kim',        'lop' => 'CNTT04', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Mạng máy tính',       'nam_tot_nghiep' => 2023],
    ['msv' => '631001', 'ho_ten' => 'Lý Văn Long',         'lop' => 'CNTT01', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Công nghệ Phần mềm', 'nam_tot_nghiep' => 2022],
    ['msv' => '631002', 'ho_ten' => 'Trịnh Thị Mai',       'lop' => 'CNTT02', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Hệ thống Thông tin',  'nam_tot_nghiep' => 2022],
    ['msv' => '631003', 'ho_ten' => 'Phan Văn Nam',        'lop' => 'CNTT03', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Mạng máy tính',       'nam_tot_nghiep' => 2022],
    ['msv' => '631004', 'ho_ten' => 'Cao Thị Oanh',        'lop' => 'CNTT01', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Công nghệ Phần mềm', 'nam_tot_nghiep' => 2022],
    ['msv' => '631005', 'ho_ten' => 'Dương Văn Phong',     'lop' => 'CNTT04', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Hệ thống Thông tin',  'nam_tot_nghiep' => 2022],
    ['msv' => '621001', 'ho_ten' => 'Hà Thị Quỳnh',        'lop' => 'CNTT02', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Công nghệ Phần mềm', 'nam_tot_nghiep' => 2021],
    ['msv' => '621002', 'ho_ten' => 'Mai Văn Sơn',         'lop' => 'CNTT03', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Mạng máy tính',       'nam_tot_nghiep' => 2021],
    ['msv' => '621003', 'ho_ten' => 'Lưu Thị Tâm',         'lop' => 'CNTT01', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Hệ thống Thông tin',  'nam_tot_nghiep' => 2021],
    ['msv' => '621004', 'ho_ten' => 'Tạ Văn Uy',           'lop' => 'CNTT04', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Công nghệ Phần mềm', 'nam_tot_nghiep' => 2021],
    ['msv' => '621005', 'ho_ten' => 'Võ Thị Vân',          'lop' => 'CNTT02', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Mạng máy tính',       'nam_tot_nghiep' => 2021],
];
    DB::table('ds_csv')->insert(
            array_map(fn($item) => array_merge($item, [
                'created_at' => now(),
                'updated_at' => now(),
            ]), $data)
        );
    }
}
