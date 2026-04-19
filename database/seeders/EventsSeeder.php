<?php

namespace Database\Seeders;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title'      => 'Ngày hội Kết nối Cựu sinh viên VNUA 2026',
                'location'   => 'Hội trường A — Học viện',
                'event_date' => '2026-04-15',
                'start_time' => '08:00:00',
                'end_time'   => '17:00:00',
                'badge'      => 'free',
            ],
            [
                'title'      => 'Hội thảo Tuyển dụng: Công nghệ trong Nông nghiệp',
                'location'   => 'Phòng B201',
                'event_date' => '2026-04-22',
                'start_time' => '13:30:00',
                'end_time'   => '16:30:00',
                'badge'      => 'register',
            ],
            [
                'title'      => 'Gặp mặt Cựu sinh viên Khoa CNTT — K60 đến K65',
                'location'   => 'Nhà hàng Xanh — Hà Nội',
                'event_date' => '2026-05-05',
                'start_time' => '18:00:00',
                'end_time'   => '21:00:00',
                'badge'      => 'free',
            ],
            [
                'title'      => 'Workshop: Khởi nghiệp trong lĩnh vực Nông nghiệp',
                'location'   => 'Trung tâm Đổi mới Sáng tạo VNUA',
                'event_date' => '2026-05-20',
                'start_time' => '09:00:00',
                'end_time'   => '12:00:00',
                'badge'      => 'register',
            ],
        ];
 
        foreach ($events as $item) {
            Event::firstOrCreate(['title' => $item['title']], $item);
        }
 
        $this->command->info('✓ Đã seed Jobs và Events thành công!');
    }
}
