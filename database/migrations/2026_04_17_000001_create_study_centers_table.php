<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('study_centers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_name')->nullable();
            $table->text('description');
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->string('head_name')->nullable();
            $table->string('head_photo')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('vision')->nullable();
            $table->text('mission')->nullable();
            $table->text('programs')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('study_centers');
    }
};
