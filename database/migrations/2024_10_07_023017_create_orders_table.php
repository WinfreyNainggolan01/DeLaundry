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
        Schema::create('orders', function (Blueprint $table) {
            //variabel student_id, dormitory_id, item_id, date
            $table->id();
            $table->string('ordx_id');
            $table->date('date_at');
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('dormitory_id')->constrained()->cascadeOnDelete();
            $table->enum('status', ['pending', 'picked_up', 'on_process', 'delivered', 'done']);
            $table->float('weight');
            $table->float('price');
            $table->json('items');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
