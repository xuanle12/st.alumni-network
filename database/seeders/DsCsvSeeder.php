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
    ['msv' => '651001', 'ho_ten' => 'Nguyễn Văn Anh',      'lop' => 'K65CNPMA', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Công nghệ Phần mềm', 'nam_tot_nghiep' => 2024],
    ['msv' => '651002', 'ho_ten' => 'Trần Thị Bình',       'lop' => 'K65HTTTB', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Hệ thống Thông tin',  'nam_tot_nghiep' => 2024],
    ['msv' => '651003', 'ho_ten' => 'Lê Văn Cường',        'lop' => 'K65CNPMB', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Công nghệ Phần mềm', 'nam_tot_nghiep' => 2024],
    ['msv' => '651004', 'ho_ten' => 'Phạm Thị Dung',       'lop' => 'K65MMTA', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Mạng máy tính',       'nam_tot_nghiep' => 2024],
    ['msv' => '651005', 'ho_ten' => 'Hoàng Văn Em',        'lop' => 'K62HTTTB', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Hệ thống Thông tin',  'nam_tot_nghiep' => 2024],
    ['msv' => '641001', 'ho_ten' => 'Vũ Thị Phương',       'lop' => 'K64CNPMC', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Công nghệ Phần mềm', 'nam_tot_nghiep' => 2023],
    ['msv' => '641002', 'ho_ten' => 'Đặng Văn Giang',      'lop' => 'K64CNPMB', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Công nghệ Phần mềm', 'nam_tot_nghiep' => 2023],
    ['msv' => '641003', 'ho_ten' => 'Bùi Thị Hoa',         'lop' => 'K64HTTTB', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Hệ thống Thông tin',  'nam_tot_nghiep' => 2023],
    ['msv' => '641004', 'ho_ten' => 'Ngô Văn Hùng',        'lop' => 'K64CNPMA', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Công nghệ Phần mềm', 'nam_tot_nghiep' => 2023],
    ['msv' => '641005', 'ho_ten' => 'Đinh Thị Kim',        'lop' => 'K64MMTA', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Mạng máy tính',       'nam_tot_nghiep' => 2023],
    ['msv' => '631001', 'ho_ten' => 'Lý Văn Long',         'lop' => 'K63CNPMA', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Công nghệ Phần mềm', 'nam_tot_nghiep' => 2022],
    ['msv' => '631002', 'ho_ten' => 'Trịnh Thị Mai',       'lop' => 'K63HTTTB', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Hệ thống Thông tin',  'nam_tot_nghiep' => 2022],
    ['msv' => '621002', 'ho_ten' => 'Mai Văn Sơn',         'lop' => 'K62CNPMA', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Công nghệ Phần mềm', 'nam_tot_nghiep' => 2021],
    ['msv' => '621003', 'ho_ten' => 'Lưu Thị Tâm',         'lop' => 'K62HTTTB', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Hệ thống Thông tin',  'nam_tot_nghiep' => 2021],
    ['msv' => '621004', 'ho_ten' => 'Tạ Văn Uy',           'lop' => 'K62CNPMB', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Công nghệ Phần mềm', 'nam_tot_nghiep' => 2021],
    ['msv' => '621005', 'ho_ten' => 'Võ Thị Vân',          'lop' => 'K62MMTA', 'khoa' => 'Công nghệ Thông tin', 'nganh' => 'Mạng máy tính',       'nam_tot_nghiep' => 2021],
];
    DB::table('ds_csv')->insert(
            array_map(fn($item) => array_merge($item, [
                'created_at' => now(),
                'updated_at' => now(),
            ]), $data)
        );
    }
}
