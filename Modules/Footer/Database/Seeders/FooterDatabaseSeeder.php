<?php

namespace Modules\Footer\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Footer\Models\Footer;

class FooterDatabaseSeeder extends Seeder
{
     public static int $count = 1;
    public function run(): void
    {
        for ($i = 0; $i < self::$count; $i++) {
            Footer::create([
                'title' => [
                    'ar' => 'footer',
                    'en' => 'My Tours',
                    'fr' => 'Mes circuits',
                    'de' => 'Über uns',
                    'pl' => 'O nas',
                    'ru' => 'О нас',
                    'zh' => '我的旅行',
                    'tr' => 'Hakkımızda',
                    'nl' => 'Over ons',
                ],
                'description' => [
                    'ar' => 'يتم استخدام هذا النص حاليًا كمحتوى مؤقت',
                    'en' => 'This text is currently being used as placeholder content',
                    'fr' => 'Ce texte est actuellement utilisé comme contenu d espace réservé',
                    'de' => 'Wir sind ein Unternehmen',
                    'pl' => 'Jesteśmy firmą',
                    'ru' => 'Мы компания',
                    'zh' => '此文字目前被用作佔位符內容',
                    'tr' => 'Biz bir şirketiz',
                    'nl' => 'Wij zijn een bedrijf',
                ],
            ]);
        }
    }
}
