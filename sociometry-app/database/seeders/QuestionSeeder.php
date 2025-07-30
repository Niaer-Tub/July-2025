<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            'Siapa tiga teman sekelas yang paling ingin kamu ajak bekerja sama dalam tugas kelompok?',
            'Siapa tiga teman yang paling sering kamu ajak bicara saat istirahat?',
            'Jika kamu sedang sedih atau punya masalah, siapa teman di kelas yang akan kamu ceritakan terlebih dahulu?',
            'Siapa tiga teman yang menurutmu paling menyenangkan untuk diajak bermain atau berbincang?',
            'Jika kalian akan duduk bersama di kelas selama satu minggu, siapa yang akan kamu pilih sebagai teman sebangkumu?',
            'Menurutmu, siapa teman di kelas yang paling perhatian kepada teman lainnya?',
            'Jika ada teman yang kamu tidak ingin ajak kerja kelompok, siapa itu?',
        ];

        foreach ($questions as $q) {
            Question::create(['text' => $q]);
        }
    }
}
