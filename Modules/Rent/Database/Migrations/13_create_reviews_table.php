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
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id'); // رقم التقييم الأساسي
            $table->unsignedBigInteger('property_id'); // العقار
            $table->unsignedBigInteger('reservation_id')->nullable(); // الحجز المرتبط
            $table->unsignedBigInteger('user_id'); // الكاتب (ضيف أو مضيف)

            $table->enum('type', [
                'property',    // تقييم العقار
                'host',        // تقييم المضيف
                'guest'        // تقييم الضيف
            ])->default('property'); // نوع التقييم

            $table->tinyInteger('rating'); // التقييم الرقمي (من 1 لـ 5 مثلاً)
            $table->text('comment')->nullable(); // التعليق النصي

            $table->timestamps(); // created_at, updated_at

            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
