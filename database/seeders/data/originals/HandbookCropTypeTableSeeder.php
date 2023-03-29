<?php

namespace Database\Seeders\data\originals;

use App\Models\HandbookCropType;
use Illuminate\Database\Seeder;

class HandbookCropTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(HandbookCropType::all()->count() > 0){
            return;
        }
        HandbookCropType::firstOrNew(['name' => 'Мягкая'])->save();
        HandbookCropType::firstOrNew(['name' => 'Твердая'])->save();
    }
}
