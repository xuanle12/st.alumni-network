<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cv_builder', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            // Thông tin liên hệ
            $table->string('full_name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('website')->nullable();

            $table->text('summary')->nullable();

            // Các mục nhiều dòng, lưu dạng JSON
            $table->json('education')->nullable();
            $table->json('experience')->nullable();
            $table->json('skills')->nullable();
            $table->json('projects')->nullable();
            $table->json('certificates')->nullable();

            $table->timestamps();

            $table->unique('user_id'); // mỗi người 1 CV
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cv_builder');
    }
};
