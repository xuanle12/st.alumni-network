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
        Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('is_admin');
        $table->enum('role', ['admin','alumni','student','lecturer','company'])->default('student')->after('password');
        $table->enum('status', ['pending','active','locked'])->default('pending')->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('status');
            $table->boolean('is_admin')->default(false);
        });
    }
};
