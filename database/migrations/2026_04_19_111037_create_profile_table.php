<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
 
            // Thông tin cơ bản
            $table->string('msv', 20)->unique();
            $table->string('lop', 30)->nullable();
            $table->string('khoa');
            $table->string('nganh')->nullable();
            $table->year('nam_tot_nghiep')->nullable();
            $table->string('phone', 15)->nullable();
            $table->text('bio')->nullable();
            $table->string('avatar')->nullable();
 
            // Địa chỉ
            $table->string('tinh_thanh')->nullable();
            $table->string('que_quan')->nullable();
 
            // Mạng xã hội
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('website')->nullable();
 
            // Trạng thái (admin quản lý)
            $table->enum('status', ['active', 'pending', 'inactive'])->default('pending');
            $table->text('admin_note')->nullable();
             $table->enum('role', ['alumni','student','lecturer','admin'])->default('student');
            $table->string('position')->nullable();
            $table->boolean('is_online')->default(false);

            $table->string('current_company')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
