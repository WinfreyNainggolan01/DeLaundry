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
<<<<<<< Updated upstream
        Schema::create('feedbacks', function (Blueprint $table) {
=======
        Schema::create('feedback', function (Blueprint $table) {
>>>>>>> Stashed changes
            $table->id();
            $table->foreignId('complaint_id')->constrained()->onDelete('cascade');
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->text('feedback_response');
<<<<<<< Updated upstream
            $table->enum('status', ['pending', 'resolved', 'unresolved'])->default('pending');
=======
            $table->enum('status', ['resolved', 'unresolved'])->default('unresolved');
>>>>>>> Stashed changes
            $table->date('date_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
