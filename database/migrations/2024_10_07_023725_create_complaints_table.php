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
        // student_id,  order_id, date_at, status, description
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->date('date_at');
            $table->enum('status', ['pending', 'responded']);
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('image_public_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

    // relation to student, order
    

    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
