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
        Schema::table('profile', function (Blueprint $table) {
        $table->dropColumn('role');
        $table->unsignedTinyInteger('experience_years')->default(0)->after('current_company');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profile', function (Blueprint $table) {
            $table->dropColumn('experience_years');
            $table->enum('role', ['alumni','student','lecturer','admin'])->default('student');
        });
    }
};
