<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ds_csv', function (Blueprint $table) {
            if (!Schema::hasColumn('ds_csv', 'cong_ty')) {
                $table->string('cong_ty')->nullable()->after('nam_tot_nghiep');
            }
            if (!Schema::hasColumn('ds_csv', 'dien_thoai')) {
                $table->string('dien_thoai', 30)->nullable()->after('cong_ty');
            }
            if (!Schema::hasColumn('ds_csv', 'dia_chi')) {
                $table->string('dia_chi')->nullable()->after('dien_thoai');
            }
            if (!Schema::hasColumn('ds_csv', 'muc_luong')) {
                $table->string('muc_luong')->nullable()->after('dia_chi');
            }
        });
    }

    public function down(): void
    {
        Schema::table('ds_csv', function (Blueprint $table) {
            $table->dropColumn(['cong_ty', 'dien_thoai', 'dia_chi', 'muc_luong']);
        });
    }
};
