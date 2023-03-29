<?php

namespace Database\Seeders\data\fakes;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::firstOrNew([
            'question' => 'Where is example question?',
            'answer' => 'Here it is',
        ])->save();

        Faq::firstOrNew([
            'question' => 'Where is example question 2?',
            'answer' => 'Here it is 2',
        ])->save();
    }
}
