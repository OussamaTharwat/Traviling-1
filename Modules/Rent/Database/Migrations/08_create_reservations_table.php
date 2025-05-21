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
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id'); // رقم الحجز الأساسي
            $table->unsignedBigInteger('property_id'); // العقار
            $table->unsignedBigInteger('user_id'); // الضيف (المستخدم اللي حجز)

            $table->date('checkin_date'); // تاريخ الدخول
            $table->date('checkout_date'); // تاريخ الخروج

            $table->integer('guests_count')->default(1); // عدد الضيوف

            $table->decimal('total_price', 10, 2); // السعر الكلي للحجز

            $table->enum('status', [
                'pending',     // في انتظار موافقة المضيف/السيستم
                'confirmed',   // تم التأكيد
                'canceled',    // تم الإلغاء
                'completed'    // انتهت الإقامة
            ])->default('pending'); // حالة الحجز

            $table->text('guest_notes')->nullable(); // ملاحظات من الضيف
            $table->text('host_notes')->nullable(); // ملاحظات من المضيف

            $table->timestamps(); // created_at, updated_at
            $table->softDeletes(); // deleted_at

            // العلاقات الخارجية (اتأكد من عمل الجداول المرتبطة)
            $table->foreign('property_id')->references('id')->on('properties');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
