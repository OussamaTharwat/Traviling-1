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
        Schema::create('property_facility', function (Blueprint $table) {
            $table->bigIncrements('id'); // رقم الصف الأساسي
            $table->unsignedBigInteger('property_id'); // العقار
            $table->unsignedBigInteger('facility_id'); // الوسيلة

            $table->timestamps(); // created_at, updated_at

            // العلاقات الخارجية (اتأكد من عمل الجدولين الأول)
            $table->foreign('property_id')->references('id')->on('properties');
            $table->foreign('facility_id')->references('id')->on('facilities');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_facilities');
    }
};
