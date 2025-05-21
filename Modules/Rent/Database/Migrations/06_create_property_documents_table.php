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
        Schema::create('property_documents', function (Blueprint $table) {
            $table->bigIncrements('id'); // رقم المستند الأساسي
            $table->unsignedBigInteger('property_id'); // العقار المرتبط

            $table->enum('type', [
                'ownership_contract',   // عقد تمليك
                'rental_contract',      // عقد إيجار
                'national_id',          // بطاقة شخصية
                'utility_bill',         // فاتورة مرافق
                'other'
            ])->default('other'); // نوع المستند

            $table->string('file_path'); // رابط أو مسار الملف
            $table->timestamp('uploaded_at')->nullable(); // تاريخ رفع المستند

            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // حالة المراجعة
            $table->text('notes')->nullable(); // ملاحظات المراجعة

            $table->timestamps(); // created_at, updated_at
            $table->softDeletes(); // deleted_at

            // العلاقات الخارجية (اتأكد من عمل جدول properties الأول)
            $table->foreign('property_id')->references('id')->on('properties');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_documents');
    }
};
