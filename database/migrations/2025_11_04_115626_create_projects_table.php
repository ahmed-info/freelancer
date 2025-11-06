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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // معلومات المشروع الأساسية
            $table->string('title');
            $table->text('description');

            // الميزانية
            $table->enum('budget_type', ['fixed', 'hourly'])->default('fixed');
            $table->decimal('budget_amount', 10, 2)->nullable();
            $table->decimal('hourly_rate', 10, 2)->nullable();
            $table->string('weekly_hours')->nullable();

            // التفاصيل
            $table->string('duration'); // 1-5 حسب الخيارات

            // الحالة
            $table->enum('status', ['draft', 'published', 'in_progress', 'completed', 'cancelled'])
                ->default('draft');

            // البيانات المخزنة كـ JSON
            $table->json('skills')->nullable(); // المهارات المطلوبة
            $table->json('attachments')->nullable(); // الملفات المرفقة

            $table->timestamps();
            $table->softDeletes();

            // الفهارس
            $table->index('user_id');
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
