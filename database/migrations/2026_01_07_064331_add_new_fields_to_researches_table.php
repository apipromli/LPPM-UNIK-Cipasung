<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('researches', function (Blueprint $table) {
            $table->string('nidn')->nullable()->after('id');
            $table->enum('scheme', ['Penelitian Dosen Pemula', 'Penelitian Pengembangan', 'Penelitian Terapan', 'Lainnya'])->default('Lainnya')->after('year');
            $table->decimal('amount', 15, 2)->nullable()->after('funding_source');
        });
    }

    public function down(): void
    {
        Schema::table('researches', function (Blueprint $table) {
            $table->dropColumn(['nidn', 'scheme', 'amount']);
        });
    }
};
