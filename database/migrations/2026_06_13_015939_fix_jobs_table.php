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
        Schema::table('jobs', function (Blueprint $table) {
        $table->dropColumn('salary');
        $table->text('description')->nullable()->after('post_id');
        $table->decimal('min_salary', 12, 0)->nullable()->after('field');
        $table->decimal('max_salary', 12, 0)->nullable()->after('min_salary');
        $table->unsignedTinyInteger('experience_required')->default(0)->after('is_active');
        $table->date('deadline')->nullable()->after('experience_required');
        $table->foreignId('created_by')->nullable()->after('deadline')->constrained('users')->nullOnDelete();
    }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->decimal('salary', 12, 0)->nullable()->after('field');
            $table->dropColumn(['description', 'min_salary', 'max_salary', 'experience_required', 'deadline', 'created_by']);
        }); 
    }
};
