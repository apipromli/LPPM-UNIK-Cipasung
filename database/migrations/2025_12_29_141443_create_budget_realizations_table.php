<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('budget_realizations', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->string('title');
            $table->decimal('budget_amount', 15, 2);
            $table->decimal('realization_amount', 15, 2);
            $table->decimal('percentage', 5, 2);
            $table->text('description')->nullable();
            $table->string('document')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('budget_realizations');
    }
};
