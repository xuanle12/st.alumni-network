<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profile', function (Blueprint $table) {
            if (!Schema::hasColumn('profile', 'salary')) {
                $table->string('salary')->nullable()->after('current_company');
            }
            if (!Schema::hasColumn('profile', 'hide_salary')) {
                $table->boolean('hide_salary')->default(false)->after('salary');
            }
            if (!Schema::hasColumn('profile', 'hide_company')) {
                $table->boolean('hide_company')->default(false)->after('hide_salary');
            }
        });
    }

    public function down(): void
    {
        Schema::table('profile', function (Blueprint $table) {
            $table->dropColumn(['salary', 'hide_salary', 'hide_company']);
        });
    }
};
