<?php

namespace Modules\Tour\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Category\Database\Seeders\CategoryDatabaseSeeder;
use Modules\Tour\Models\Tour;

class TourDatabaseSeeder extends Seeder
{
    public  static int $count = 10;

    public function run(): void
    {
        for ($i = 0; $i < self::$count; $i++) {
            Tour::create([
                'title' => [
                    'ar' => 'مغامرة في الصحراء',
                    'en' => 'Adventure in the Desert',
                    'fr' => 'Adventure in the Desert',
                    'pl' => 'Adventure in the Desert',
                    'nl' => 'Adventure in the Desert',
                    'de' => 'Adventure in the Desert',
                    'ru' => 'Adventure in the Desert',
                    'zh' => '沙漠探险之旅',
                    'tr' => 'Adventure in the Desert',
                ],
                'description' => [
                    'ar' => 'مغامرة لا تُنسى لمدة 4 أيام في قلب الصحراء.',
                    'en' => 'An unforgettable 4-day adventure in the heart of the desert.',
                    'fr' => 'An unforgettable 4-day adventure in the heart of the desert.',
                    'ru' => 'An unforgettable 4-day adventure in the heart of the desert.',
                    'de' => 'An unforgettable 4-day adventure in the heart of the desert.',
                    'tr' => 'An unforgettable 4-day adventure in the heart of the desert.',
                    'nl' => 'An unforgettable 4-day adventure in the heart of the desert.',
                    'pl' => 'An unforgettable 4-day adventure in the heart of the desert.',
                    'zh' => '在沙漠腹地难忘的4天冒险之旅。',
                ],
                'itinerary' => [
                    'Day 1' => 'Arrival and camp setup',
                    'Day 2' => 'Desert tour and camel ride',
                    'Day 3' => 'Sandboarding and star gazing',
                    'Day 4' => 'Wrap up and return'
                ],
                'facilities' => [
                    'Camping Tents',
                    'Portable Toilet',
                    'Cooking Equipment'
                ],
                'features' => [
                    'Electric Tent Lights',
                    'Smoking Allowed',
                    'Wireless Internet'
                ],
                'duration' => fake()->randomElement([
                    '1 Day',
                    '2 Days',
                    '3 Days',
                    '4 Days',
                    '1 Week',
                    '10 Days',
                    '2 Weeks',
                ]),
                'difficulty' => fake()->sentence(),
                'group_size' => fake()->numberBetween(10, 50),
                'discound' => 0.1,
                'price_per_person' => fake()->numberBetween(10, 100),
                'map_url' => 'https://www.google.com/maps/@29.9958272,31.1558144,14z?entry=ttu&g_ep=EgoyMDI1MDUxMi4wIKXMDSoJLDEwMjExNDU1SAFQAw%3D%3D',
                'category_id' => rand(1, CategoryDatabaseSeeder::$recordsCount),
            ]);
        }
    }
}
