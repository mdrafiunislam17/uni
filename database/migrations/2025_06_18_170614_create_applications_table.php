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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->foreignId('course_id')
                ->constrained('courses')
                ->onDelete('cascade');
            $table->foreignId('visa_type_id')
                ->constrained('visa_types')
                ->onDelete('cascade');
            $table->string('postal_address')->nullable();
            $table->string('referrer_name')->nullable();
            $table->string('referrer_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
