<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobseekers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('cap')->nullable();
            $table->string('street')->nullable();
            $table->string('gender')->nullable();
            $table->boolean('completed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobseekers');
    }
};