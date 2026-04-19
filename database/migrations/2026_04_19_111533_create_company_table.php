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
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('field')->nullable();          
            $table->string('website')->nullable();
            $table->string('size')->nullable();           
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
 
            // Người liên hệ
            $table->string('contact_name')->nullable();
            $table->string('contact_position')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
 
            // Trạng thái
            $table->enum('status', ['active', 'pending', 'inactive'])->default('pending');
            $table->text('admin_note')->nullable();
 
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company');
    }
};
