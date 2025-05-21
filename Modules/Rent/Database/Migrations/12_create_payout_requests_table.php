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
        Schema::create('payout_requests', function (Blueprint $table) {
            $table->bigIncrements('id'); // رقم الطلب الأساسي
            $table->unsignedBigInteger('user_id'); // المستخدم المستفيد (المضيف)
            $table->unsignedBigInteger('transaction_id')->nullable(); // المعاملة المرتبطة (اختياري)
            $table->decimal('amount', 12, 2); // المبلغ
            $table->string('bank_details')->nullable(); // بيانات الحساب البنكي أو التحويل
            $table->enum('status', [
                'pending',     // في الانتظار
                'processing',  // جاري التحويل
                'completed',   // تم التحويل
                'rejected'     // تم الرفض
            ])->default('pending'); // حالة الطلب

            $table->timestamps(); // created_at, updated_at

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payout_requests');
    }
};
