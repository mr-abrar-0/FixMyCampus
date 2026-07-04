<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('title', 150);
            $table->string('category', 100);
            $table->string('location', 150);
            $table->enum('priority', ['Low', 'Medium', 'High'])->default('Medium');
            $table->text('description');
            $table->enum('status', ['Pending', 'In Progress', 'Solved', 'Rejected'])->default('Pending');
            $table->foreignId('assigned_staff_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('remarks', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
