<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Category\Models\Category;

class CategoryDatabaseSeeder extends Seeder
{
    public static int $recordsCount = 10;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < self::$recordsCount; $i++) {
            Category::create([
                'name' => fake()->sentence(),
            ]);
        }
    }
}
