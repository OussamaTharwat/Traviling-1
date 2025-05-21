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
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id'); // رقم الرسالة الأساسي
            $table->unsignedBigInteger('reservation_id')->nullable(); // الحجز المرتبط (اختياري)
            $table->unsignedBigInteger('property_id')->nullable(); // العقار المرتبط (اختياري)
            $table->unsignedBigInteger('sender_id'); // المرسل
            $table->unsignedBigInteger('receiver_id'); // المستقبل

            $table->text('message'); // نص الرسالة

            $table->timestamp('sent_at')->useCurrent(); // وقت الإرسال
            $table->timestamps(); // created_at, updated_at
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('set null');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('set null');
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');

        
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
