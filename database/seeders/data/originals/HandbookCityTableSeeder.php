<?php

namespace Database\Seeders\data\originals;

use App\Models\HandbookCity;
use Illuminate\Database\Seeder;

class HandbookCityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(HandbookCity::all()->count() > 0){
            return;
        }
        HandbookCity::firstOrNew([
            'name' => 'Нур-Султан',
            'handbook_region_id' => 1,
            'created_at' => now()
        ])->save();

        HandbookCity::firstOrNew([
            'name' => 'Алматы',
            'handbook_region_id' => 2,
            'created_at' => now()
        ])->save();

        HandbookCity::firstOrNew([
            'name' => 'Шымкент',
            'handbook_region_id' => 3,
            'created_at' => now()
        ])->save();

        HandbookCity::firstOrNew([
            'name' => 'Актау',
            'handbook_region_id' => 4,
            'created_at' => now()
        ])->save();

        HandbookCity::firstOrNew([
            'name' => 'Кызылорда',
            'handbook_region_id' => 5,
            'created_at' => now()
        ])->save();
    }
}
