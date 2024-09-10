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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('date_ofentry_into_service')->nullable();
            $table->string('diploma')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('photo')->nullable();
            $table->string('matriculation')->unique();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->foreignId('structure_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
