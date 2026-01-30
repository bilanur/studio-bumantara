<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            // Cek dan ubah kolom yang sudah ada jadi nullable
            if (Schema::hasColumn('packages', 'name')) {
                $table->string('name')->nullable()->change();
            }
            if (Schema::hasColumn('packages', 'description')) {
                $table->text('description')->nullable()->change();
            }
            if (Schema::hasColumn('packages', 'duration')) {
                $table->integer('duration')->nullable()->change();
            }
            if (Schema::hasColumn('packages', 'price')) {
                $table->integer('price')->nullable()->change();
            }
            if (Schema::hasColumn('packages', 'max_people')) {
                $table->integer('max_people')->nullable()->change();
            }
            
            // Tambah kolom image hanya jika belum ada
            if (!Schema::hasColumn('packages', 'image')) {
                $table->string('image')->nullable()->after('max_people');
            }
            
            // Tambah kolom baru
            if (!Schema::hasColumn('packages', 'theme_count')) {
                $table->integer('theme_count')->nullable()->after('image')->comment('Jumlah tema');
            }
            if (!Schema::hasColumn('packages', 'print_count')) {
                $table->integer('print_count')->nullable()->after('theme_count')->comment('Jumlah cetak foto');
            }
            if (!Schema::hasColumn('packages', 'edited_count')) {
                $table->integer('edited_count')->nullable()->after('print_count')->comment('Jumlah edited file');
            }
            if (!Schema::hasColumn('packages', 'has_gdrive')) {
                $table->boolean('has_gdrive')->default(false)->after('edited_count');
            }
        });
    }

    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            // Hanya drop kolom yang ada
            $columns = ['theme_count', 'print_count', 'edited_count', 'has_gdrive'];
            
            foreach ($columns as $column) {
                if (Schema::hasColumn('packages', $column)) {
                    $table->dropColumn($column);
                }
            }
            
            // Jangan drop image karena mungkin sudah ada sebelumnya
        });
    }
};