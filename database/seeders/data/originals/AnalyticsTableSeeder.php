<?php

namespace Database\Seeders\data\originals;

use App\Models\Analytic;
use App\Models\HandbookCity;
use Illuminate\Database\Seeder;

class AnalyticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Analytic::all()->count() > 0){
            return;
        }

        Analytic::firstOrNew([
            'title' => "Цены на зерно в Казахстане на 19 ноября 2021 года",
            'subtitle' => "По данным операторов, цена пшеницы на внутреннем рынке Казахстана, из-за снижения экспортного ценника, продолжает дешеветь",
            'description' => "Индекс цен пшеницы 3 класса (23 клей), с НДС на элеваторе (Северные регионы), тг/кг",
            'created_at' => now()
        ])->save();
    }
}
