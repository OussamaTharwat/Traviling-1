<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\AboutUs\Database\Seeders\AboutUsDatabaseSeeder;
use Modules\Auth\Database\Seeders\AuthDatabaseSeeder;
use Modules\Category\Database\Seeders\CategoryDatabaseSeeder;
use Modules\Footer\Database\Seeders\FooterDatabaseSeeder;
use Modules\FQ\Database\Seeders\FQDatabaseSeeder;
use Modules\Role\Database\Seeders\RoleDatabaseSeeder;
use Modules\Tour\Database\Seeders\TourDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AuthDatabaseSeeder::class,
            AboutUsDatabaseSeeder::class,
            RoleDatabaseSeeder::class,
            FQDatabaseSeeder::class,
            CategoryDatabaseSeeder::class,
            FooterDatabaseSeeder::class,
            TourDatabaseSeeder::class,
        ]);
    }
}
