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
        Schema::create('availability_calendar', function (Blueprint $table) {
            $table->bigIncrements('id'); // رقم الصف الأساسي
            $table->unsignedBigInteger('property_id'); // العقار

            $table->date('start_date'); // تاريخ البداية
            $table->date('end_date'); // تاريخ النهاية

            $table->boolean('is_available')->default(true); // متاح/غير متاح

            $table->enum('type', [
                'booking',        // حجز عن طريق الضيف
                'owner_blocked',  // محجوز يدويًا بواسطة المضيف
                'maintenance',    // صيانة
                'other'
            ])->default('booking'); // سبب الحجز أو الغلق

            $table->unsignedBigInteger('reservation_id')->nullable(); // لو مرتبط بحجز فعلي
            $table->text('notes')->nullable(); // ملاحظات إضافية

            $table->timestamps(); // created_at, updated_at

            // العلاقات الخارجية (اتأكد من عمل الجداول المرتبطة)
            $table->foreign('property_id')->references('id')->on('properties');
            $table->foreign('reservation_id')->references('id')->on('reservations');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availability_calendars');
    }
};
