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
        Schema::create('reservation_status_history', function (Blueprint $table) {
            $table->bigIncrements('id'); // رقم الصف الأساسي
            $table->unsignedBigInteger('reservation_id'); // الحجز المرتبط
            $table->string('old_status'); // الحالة السابقة (pending, confirmed, canceled, completed)
            $table->string('new_status'); // الحالة الجديدة
            $table->unsignedBigInteger('changed_by_user_id')->nullable(); // مين غير الحالة (اختياري)
            $table->text('notes')->nullable(); // ملاحظات على التغيير

            $table->timestamp('created_at')->useCurrent(); // وقت التغيير
            
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->foreign('changed_by_user_id')->references('id')->on('users')->onDelete('set null');

        
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_status_histories');
    }
};
