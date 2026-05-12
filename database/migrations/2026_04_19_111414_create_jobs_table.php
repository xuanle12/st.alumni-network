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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company');
            $table->foreignId('company_id')->nullable();
            $table->foreignId('post_id')->nullable();
            $table->string('location')->nullable();
            $table->string('khoa')->nullable();
            $table->string('type')->default('full-time'); 
            $table->string('field')->nullable();          
            $table->string('salary')->nullable();        
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
