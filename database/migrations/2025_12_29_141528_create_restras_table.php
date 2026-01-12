<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('restras', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->year('start_year');
            $table->year('end_year');
            $table->text('description')->nullable();
            $table->string('document');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('restras');
    }
};
