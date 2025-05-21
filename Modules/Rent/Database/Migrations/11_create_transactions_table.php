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
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id'); // رقم العملية الأساسي
            $table->unsignedBigInteger('reservation_id')->nullable(); // الحجز المرتبط (لو العملية تخص حجز)
            $table->unsignedBigInteger('property_id')->nullable(); // العقار (اختياري)
            $table->unsignedBigInteger('user_id'); // المستخدم المستفيد أو الدافع

            $table->enum('type', [
                'payment',     // دفع من الضيف
                'payout',      // تحويل للمضيف
                'refund',      // استرجاع
                'commission',  // عمولة المنصة
                'other'
            ])->default('payment'); // نوع العملية

            $table->decimal('amount', 12, 2); // المبلغ
            $table->unsignedBigInteger('payment_method_id')->nullable(); // طريقة الدفع (لو هتربطه بجدول طرق الدفع)
            $table->enum('status', [
                'pending',     // في الانتظار
                'completed',   // تم
                'failed',      // فشل
                'refunded'     // تم الاسترجاع
            ])->default('pending'); // حالة العملية

            $table->string('payment_reference')->nullable(); // رقم مرجعي من البنك أو بوابة الدفع
            $table->timestamps(); // created_at, updated_at

            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('set null');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
