<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id'); // رقم العقار الأساسي
            $table->unsignedBigInteger('user_id'); // صاحب العقار (مضيف)
            $table->unsignedBigInteger('area_id'); // المنطقة/الحي

            $table->string('title'); // عنوان العقار
            $table->text('description')->nullable(); // وصف تفصيلي

            $table->enum('type', ['apartment', 'room', 'villa', 'other'])->default('apartment'); // نوع العقار
            $table->decimal('price', 10, 2); // سعر الليلة

            $table->integer('beds')->default(1); // عدد الأسرة
            $table->integer('bathrooms')->default(1); // عدد الحمامات
            $table->integer('floor_number')->nullable(); // رقم الطابق
            $table->string('building_name')->nullable(); // اسم المجمع السكني
            $table->float('area')->nullable(); // المساحة

            $table->string('address'); // العنوان النصي الكامل
            $table->decimal('location_lat', 10, 8)->nullable(); // دائرة العرض
            $table->decimal('location_lng', 11, 8)->nullable(); // خط الطول
            $table->string('google_maps_url')->nullable(); // رابط جوجل مابس

            $table->enum('verification_status', ['pending', 'verified', 'rejected'])->default('pending'); // حالة التحقق
            $table->timestamp('verified_at')->nullable(); // تاريخ التحقق

            $table->boolean('is_available')->default(true); // متاح للحجز

            $table->enum('status', ['pending', 'approved', 'rejected', 'suspended'])->default('pending'); // حالة مراجعة الإدارة
            $table->string('suspended_reason')->nullable(); // سبب الإيقاف

            $table->unsignedInteger('views_count')->default(0); // عدد مرات المشاهدة
            $table->unsignedInteger('bookings_count')->default(0); // عدد مرات الحجز
            $table->float('average_rating')->default(0); // متوسط التقييم

            $table->string('main_image_url')->nullable(); // رابط الصورة الرئيسية

            $table->timestamps(); // created_at, updated_at
            $table->softDeletes(); // deleted_at

            // العلاقات الخارجية (يفضل إضافتها لاحقًا لما تعمل الجداول التانية)
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('area_id')->references('id')->on('areas');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
