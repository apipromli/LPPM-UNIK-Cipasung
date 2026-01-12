<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('researches', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('researcher');
            $table->year('year');
            $table->enum('type', ['internal', 'eksternal'])->default('internal');
            $table->string('funding_source')->nullable();
            $table->text('abstract')->nullable();
            $table->string('document')->nullable();
            $table->enum('status', ['ongoing', 'completed'])->default('ongoing');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('researches');
    }
};
