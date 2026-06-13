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
        Schema::table('events', function (Blueprint $table) {
        $table->dropColumn('is_active');
        $table->enum('status', ['draft','active','closed'])->default('draft')->after('badge');
        $table->text('description')->nullable()->after('status');
        $table->unsignedInteger('likes_count')->default(0)->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->boolean('is_active')->default(false);
            $table->dropColumn(['status', 'description', 'likes_count']);
        });
    }
};
