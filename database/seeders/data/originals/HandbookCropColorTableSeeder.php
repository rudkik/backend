<?php

namespace Database\Seeders\data\originals;

use App\Models\HandbookCropColor;
use Illuminate\Database\Seeder;

class HandbookCropColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(HandbookCropColor::all()->count() > 0){
            return;
        }
        HandbookCropColor::firstOrNew(['name' => 'Нормальный'])->save();
        HandbookCropColor::firstOrNew(['name' => 'Потемневший'])->save();
        HandbookCropColor::firstOrNew(['name' => 'Обесцвеченный'])->save();
    }
}
