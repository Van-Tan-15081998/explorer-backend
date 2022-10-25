<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeWordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $typeWords = [
            [
                'id' => 1,
                'acronym' => 'n',
                'eng_description' => 'Noun',
                'vie_description' => 'Danh từ',
                'background_color' => '',
                'text_color' => ''
            ],
            [
                'id' => 2,
                'acronym' => 'v',
                'eng_description' => 'Verb',
                'vie_description' => 'Động từ',
                'background_color' => '',
                'text_color' => ''
            ],
            [
                'id' => 3,
                'acronym' => 'adj',
                'eng_description' => 'Adjective',
                'vie_description' => 'Tính từ',
                'background_color' => '',
                'text_color' => ''
            ],
            [
                'id' => 4,
                'acronym' => 'adv',
                'eng_description' => 'Adverb',
                'vie_description' => 'Trạng từ',
                'background_color' => '',
                'text_color' => ''
            ],
            [
                'id' => 5,
                'acronym' => 'pre',
                'eng_description' => 'Preposition',
                'vie_description' => 'Giới từ',
                'background_color' => '',
                'text_color' => ''
            ],
            [
                'id' => 6,
                'acronym' => 'P',
                'eng_description' => 'Pronoun',
                'vie_description' => 'Đại từ',
                'background_color' => '',
                'text_color' => ''
            ],
            [
                'id' => 7,
                'acronym' => 'Determine',
                'eng_description' => 'Determine',
                'vie_description' => 'Từ hạn định',
                'background_color' => '',
                'text_color' => ''
            ],
            [
                'id' => 8,
                'acronym' => 'Conjunction',
                'eng_description' => 'Conjunction',
                'vie_description' => 'Liên từ',
                'background_color' => '',
                'text_color' => ''
            ],
            [
                'id' => 9,
                'acronym' => 'Interjection',
                'eng_description' => 'Interjection',
                'vie_description' => 'Thán từ',
                'background_color' => '',
                'text_color' => ''
            ],
            [
                'id' => 10,
                'acronym' => 'Other',
                'eng_description' => 'Other',
                'vie_description' => 'khác',
                'background_color' => '',
                'text_color' => ''
            ],
        ];

        DB::table('type_words')->insert($typeWords);
    }
}
