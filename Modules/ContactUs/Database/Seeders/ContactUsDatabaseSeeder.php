<?php

namespace Modules\ContactUs\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ContactUs\Models\ContactUs;

class ContactUsDatabaseSeeder extends Seeder
{
    public static int $count = 5;
    public function run(): void
    {
        for ($i = 0; $i < self::$count; $i++) {
            ContactUs::create([
                'first_name' => fake()->name(),
                'last_name' => fake()->name(),
                'email' => fake()->email(),
                // 'map_url' => 'https://www.google.com/maps/@29.9958272,31.1558144,14z?entry=ttu&g_ep=EgoyMDI1MDUxMi4wIKXMDSoJLDEwMjExNDU1SAFQAw%3D%3D',
                'phone' => fake()->phoneNumber(),
                'message' => fake()->paragraph(),
            ]);
        }
    }
}
