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
        Schema::create('ds_csv', function (Blueprint $table) {
            $table->id();
            $table->string('msv', 20)->unique();
            $table->string('ho_ten');
            $table->string('lop', 30)->nullable();
            $table->string('khoa')->nullable();
            $table->string('nganh')->nullable();
            $table->year('nam_tot_nghiep')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ds_csv');
    }
};
