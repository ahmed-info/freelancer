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
        Schema::create('freelancers', function (Blueprint $table) {
             $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();//
            $table->string('title'); // مثل: مطور واجهات أمامية
            $table->text('bio')->nullable(); // نبذة عني
            $table->string('country')->default('العراق');
            $table->string('profile_image')->nullable();
            $table->year('member_since')->default(now()->year);
            $table->boolean('is_verified')->default(false); // الهوية موثقة
            $table->boolean('is_online')->default(false);

            // الإحصائيات
            $table->decimal('response_rate', 5, 2)->default(0); // معدل الاستجابة %
            $table->integer('response_time')->default(0); // سرعة الاستجابة بالدقائق
            $table->decimal('on_time_delivery', 5, 2)->default(0); // إنجاز المشاريع في الوقت %
            $table->decimal('rehire_rate', 5, 2)->default(0); // إعادة التوظيف %

            // التقييم
            $table->decimal('rating', 3, 2)->default(0); // التقييم من 5
            $table->integer('reviews_count')->default(0); // عدد التقييمات
            $table->integer('projects_count')->default(0); // عدد المشاريع

            $table->timestamps();

            // Indexes
            $table->index('rating');
            $table->index('is_verified');
            $table->index('country');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freelancers');
    }
};
