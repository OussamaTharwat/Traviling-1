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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->bigIncrements('id'); // رقم طريقة الدفع الأساسي
            $table->string('name'); // اسم طريقة الدفع
            $table->string('code')->unique(); // كود داخلي
            $table->boolean('is_active')->default(true); // مفعلة أو لا
            $table->integer('order')->default(0); // ترتيب الظهور
            $table->json('settings')->nullable(); // بيانات أو إعدادات إضافية
            $table->timestamps(); // created_at, updated_at
            $table->softDeletes(); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
