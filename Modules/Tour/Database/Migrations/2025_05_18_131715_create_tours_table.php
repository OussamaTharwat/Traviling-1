<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Tour\Enum\StatusTour;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('description');
            $table->json('itinerary');
            $table->json('facilities');
            $table->json('features');
            $table->string('duration');
            $table->string('difficulty');
            $table->integer('group_size');
            $table->decimal('discound', 5, 2);
            $table->decimal('price_per_person', 5, 2);
            $table->string('map_url')->nullable();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
