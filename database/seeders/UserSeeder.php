<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'a@gmail.com'],
            [
                'name' => 'Nguyễn Văn A',
                'password' => Hash::make('123456'),
                'is_admin' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'b@gmail.com'],
            [
                'name' => 'Trần Thị B',
                'password' => Hash::make('123456'),
                'is_admin' => false,
            ]
        );

        User::updateOrCreate(
            ['email' => 'c@gmail.com'],
            [
                'name' => 'Lê Văn C',
                'password' => Hash::make('123456'),
                'is_admin' => false,
            ]
        );
    }
}
