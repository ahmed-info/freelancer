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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('freelancer_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2); // السعر بالدولار
            $table->integer('delivery_days'); // عدد أيام التسليم
            $table->boolean('is_active')->default(true);
            $table->integer('orders_count')->default(0);
            $table->decimal('rating', 3, 2)->default(0);
            $table->timestamps();

            $table->index('freelancer_id');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
