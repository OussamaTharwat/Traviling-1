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
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->bigIncrements('id'); // رقم البلاغ الأساسي
            $table->unsignedBigInteger('user_id'); // المستخدم اللي عمل البلاغ
            $table->unsignedBigInteger('property_id')->nullable(); // العقار المرتبط (اختياري)
            $table->unsignedBigInteger('reservation_id')->nullable(); // الحجز المرتبط (اختياري)

            $table->string('title'); // عنوان الشكوى
            $table->text('body'); // نص الشكوى
            $table->enum('status', [
                'open',        // مفتوح
                'in_progress', // جاري العمل عليه
                'resolved',    // تم الحل
                'closed'       // مغلق
            ])->default('open'); // حالة الشكوى

            $table->timestamps(); // created_at, updated_at

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('set null');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};
