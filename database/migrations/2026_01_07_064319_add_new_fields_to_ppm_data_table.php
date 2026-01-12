<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ppm_data', function (Blueprint $table) {
            $table->string('nidn')->nullable()->after('id');
            $table->enum('scheme', ['Ibp', 'ITGbM', 'PPM Mandiri', 'PPM Kolaborasi Pesantren', ' InPDikti', 'Lainnya'])->default('Ibp')->after('year');
            // Hapus kolom yang tidak diperlukan jika ada
            // $table->dropColumn(['description', 'document', 'status']); // Optional
        });
    }

    public function down(): void
    {
        Schema::table('ppm_data', function (Blueprint $table) {
            $table->dropColumn(['nidn', 'scheme']);
        });
    }
};
