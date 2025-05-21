<?php

namespace Modules\AboutUs\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\AboutUs\Models\AboutUs;

class AboutUsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::create([
            'title_about' => [
                'en' => 'About Us',
                'fr' => 'À propos de nous',
                'ar' => 'من نحن',
                'de' => 'Über uns',
                'pl' => 'O nas',
                'ru' => 'О нас',
                'zh' => '关于我们',
                'tr' => 'Hakkımızda',
                'nl' => 'Over ons',
            ],
            'description_about' => [
                'en' => 'We are a company',
                'fr' => 'Nous sommes une entreprise',
                'ar' => 'نحن شركة',
                'de' => 'Wir sind ein Unternehmen',
                'pl' => 'Jesteśmy firmą',
                'ru' => 'Мы компания',
                'zh' => '我们是一家公司',
                'tr' => 'Biz bir şirketiz',
                'nl' => 'Wij zijn een bedrijf',
            ],
            'title_mission' => [
                'en' => 'Our Mission',
                'fr' => 'Notre mission',
                'ar' => 'مهمتنا',
                'de' => 'Unsere Mission',
                'pl' => 'Nasza misja',
                'ru' => 'Наша миссия',
                'zh' => '我们的使命',
                'tr' => 'Misyonumuz',
                'nl' => 'Onze missie',
            ],
            'description_mission' => [
                'en' => 'To provide the best',
                'fr' => 'Fournir le meilleur',
                'ar' => 'تقديم الأفضل',
                'de' => 'Das Beste bieten',
                'pl' => 'Zapewniać to, co najlepsze',
                'ru' => 'Предоставлять лучшее',
                'zh' => '提供最好的服务',
                'tr' => 'En iyisini sağlamak',
                'nl' => 'Het beste bieden',
            ],
            'title_vision' => [
                'en' => 'Our Vision',
                'fr' => 'Notre vision',
                'ar' => 'رؤيتنا',
                'de' => 'Unsere Vision',
                'pl' => 'Nasza wizja',
                'ru' => 'Наше видение',
                'zh' => '我们的愿景',
                'tr' => 'Vizyonumuz',
                'nl' => 'Onze visie',
            ],
            'description_vision' => [
                'en' => 'To be the leader',
                'fr' => 'Être le leader',
                'ar' => 'أن نكون الرواد',
                'de' => 'Der Marktführer sein',
                'pl' => 'Być liderem',
                'ru' => 'Быть лидером',
                'zh' => '成为领导者',
                'tr' => 'Lider olmak',
                'nl' => 'De leider zijn',
            ],
        ]);
    }
}
