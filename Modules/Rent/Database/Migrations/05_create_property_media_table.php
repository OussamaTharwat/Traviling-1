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
        Schema::create('property_media', function (Blueprint $table) {
            $table->bigIncrements('id'); // رقم الوسيلة الأساسي
            $table->unsignedBigInteger('property_id'); // العقار المرتبط

            $table->enum('type', [
                'image',   // صورة
                'video'    // فيديو
            ])->default('image'); // نوع الوسيلة

            $table->string('file_path'); // رابط أو مسار الملف
            $table->integer('order')->default(0); // ترتيب العرض (اختياري)
            $table->string('caption')->nullable(); // وصف مختصر (اختياري)

            $table->timestamps(); // created_at, updated_at

            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_media');
    }
};
