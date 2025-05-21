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
        Schema::create('areas', function (Blueprint $table) {
            $table->bigIncrements('id'); // رقم المنطقة
            $table->string('name'); // اسم المنطقة
            $table->string('city')->nullable(); // اسم المدينة (اختياري)
            $table->text('description')->nullable(); // وصف
            $table->boolean('is_active')->default(true); // مفعلة أو لا
            $table->integer('order')->default(0); // ترتيب العرض
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
