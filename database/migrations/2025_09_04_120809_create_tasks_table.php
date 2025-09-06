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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('courses_id')->constrained('courses')->onDelete('cascade');
            $table->string("name");
            $table->enum('category', ['Materi', 'Tugas', 'Quiz', 'Soal']);
            $table->text('content')->nullable();
            $table->string('file')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('required')->nullable();
            $table->foreign('required')->references('id')->on('tasks')->onDelete('set null');
            $table->dateTime('deadline')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
