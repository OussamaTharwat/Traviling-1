<?php

namespace Modules\FQ\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\FQ\Models\FQ;

class FQDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            FQ::create([
                'question' => [
                    'ar' => 'السؤال ' . $i,
                    'en' => 'Question ' . $i,
                    'fr' => 'Question ' . $i,
                    'de' => 'Frage ' . $i,
                    'zh' => '問題 ' . $i,
                    'pl' => 'Question ' . $i,
                    'nl' => 'Question ' . $i,
                    'ru' => 'Question ' . $i,
                    'tr' => 'Question ' . $i,
                ],
                'answer' => [
                    'ar' => 'الإجابة ' . $i,
                    'en' => 'Answer ' . $i,
                    'fr' => 'Réponse ' . $i,
                    'de' => 'Réponse ' . $i,
                    'zh' => 'Réponse ' . $i,
                    'pl' => 'Réponse ' . $i,
                    'nl' => 'Réponse ' . $i,
                    'ru' => 'Réponse ' . $i,
                    'tr' => 'Réponse ' . $i,
                ]
            ]);
        }
    }
}
