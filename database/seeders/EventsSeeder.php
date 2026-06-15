<?php

namespace Database\Seeders;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $today = Carbon::today();
 
        $events = [
            [
                'title'       => 'Ngày hội Kết nối Cựu sinh viên Khoa CNTT 2026',
                'location'    => 'Hội trường A — Khoa Công nghệ Thông tin, VNUA',
                'event_date'  => $today->copy()->subDays(60)->toDateString(),
                'start_time'  => '08:00:00',
                'end_time'    => '17:00:00',
                'badge'       => 'free',
                'status'      => 'closed',
                'description' => 'Sự kiện kết nối cựu sinh viên Khoa CNTT các khoá, chia sẻ kinh nghiệm nghề nghiệp và mở rộng mạng lưới quan hệ.',
            ],
            [
                'title'       => 'Gặp mặt Cựu sinh viên Khoa CNTT — K60 đến K65',
                'location'    => 'Nhà hàng Xanh — Hà Nội',
                'event_date'  => $today->copy()->subDays(20)->toDateString(),
                'start_time'  => '18:00:00',
                'end_time'    => '21:00:00',
                'badge'       => 'free',
                'status'      => 'closed',
                'description' => 'Buổi gặp mặt thân mật dành cho cựu sinh viên Khoa CNTT các khoá K60 - K65, ôn lại kỷ niệm và kết nối hợp tác.',
            ],
 
            [
                'title'       => 'Hội thảo Tuyển dụng IT: Cơ hội nghề nghiệp cho sinh viên CNTT',
                'location'    => 'Phòng B201 — Khoa CNTT, VNUA',
                'event_date'  => $today->copy()->addDays(3)->toDateString(),
                'start_time'  => '13:30:00',
                'end_time'    => '16:30:00',
                'badge'       => 'register',
                'status'      => 'active',
                'description' => 'Các doanh nghiệp công nghệ trao đổi trực tiếp với sinh viên và cựu sinh viên Khoa CNTT về cơ hội việc làm, lộ trình phát triển.',
            ],
            [
                'title'       => 'Workshop: Khởi nghiệp Công nghệ dành cho Cựu sinh viên CNTT',
                'location'    => 'Trung tâm Đổi mới Sáng tạo VNUA',
                'event_date'  => $today->copy()->addDays(7)->toDateString(),
                'start_time'  => '09:00:00',
                'end_time'    => '12:00:00',
                'badge'       => 'free',
                'status'      => 'active',
                'description' => 'Workshop chia sẻ kinh nghiệm khởi nghiệp trong lĩnh vực công nghệ, dành cho cựu sinh viên và sinh viên Khoa CNTT quan tâm đến startup.',
            ],
 
            [
                'title'       => 'Chuỗi Seminar: Xu hướng Công nghệ AI & Dữ liệu cho Cựu SV CNTT',
                'location'    => 'Phòng hội thảo trực tuyến (Online)',
                'event_date'  => $today->copy()->addDays(20)->toDateString(),
                'start_time'  => '19:00:00',
                'end_time'    => '21:00:00',
                'badge'       => 'free',
                'status'      => 'active',
                'description' => 'Chuỗi seminar online chia sẻ các xu hướng công nghệ mới nhất về AI, Big Data, dành riêng cho cộng đồng cựu sinh viên Khoa CNTT.',
            ],
            [
                'title'       => 'Ngày hội Việc làm CNTT 2026',
                'location'    => 'Sân vận động Học viện Nông nghiệp Việt Nam',
                'event_date'  => $today->copy()->addDays(35)->toDateString(),
                'start_time'  => '08:00:00',
                'end_time'    => '17:00:00',
                'badge'       => 'free',
                'status'      => 'active',
                'description' => 'Ngày hội việc làm quy mô lớn dành cho sinh viên và cựu sinh viên Khoa CNTT, với sự tham gia của nhiều doanh nghiệp công nghệ.',
            ],
            [
                'title'       => 'Tọa đàm: Định hướng nghề nghiệp cho Cựu sinh viên CNTT',
                'location'    => 'Phòng họp tầng 3 — Khoa CNTT, VNUA',
                'event_date'  => $today->copy()->addDays(45)->toDateString(),
                'start_time'  => '14:00:00',
                'end_time'    => '17:00:00',
                'badge'       => 'register',
                'status'      => 'active',
                'description' => 'Tọa đàm chia sẻ về định hướng phát triển nghề nghiệp dài hạn dành cho cựu sinh viên Khoa CNTT ở nhiều giai đoạn sự nghiệp.',
            ],
        ];
 
        foreach ($events as $item) {
            Event::updateOrCreate(['title' => $item['title']], $item);
        }
 
        $this->command->info('✓ Đã seed Events  thành công!');
    }
}
