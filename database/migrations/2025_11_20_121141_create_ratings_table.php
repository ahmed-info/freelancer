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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('freelancer_id')->constrained()->onDelete('cascade');
            $table->integer('rating')->nullable(); // قيمة التقييم من 1 إلى 5 مثلاً
            $table->text('comment')->nullable(); // تعليق العميل
            $table->timestamps();
            $table->unique(['user_id', 'freelancer_id']); // لضمان أن المستخدم لا يقيم نفس المنشور أكثر من مرة
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
