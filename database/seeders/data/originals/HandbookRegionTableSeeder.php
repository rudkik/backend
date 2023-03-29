<?php

namespace Database\Seeders\data\originals;

use App\Models\HandbookRegion;
use Illuminate\Database\Seeder;

class HandbookRegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(HandbookRegion::all()->count() > 0){
            return;
        }
        HandbookRegion::firstOrNew([
            'name' => 'Акмолинская область',
            'handbook_country_id' => 1,
            'created_at' => now()
        ])->save();


        HandbookRegion::firstOrNew([
            'name' => 'Алматинская область',
            'handbook_country_id' => 1,
            'created_at' => now()
        ])->save();


        HandbookRegion::firstOrNew([
            'name' => 'Туркестанская область',
            'handbook_country_id' => 1,
            'created_at' => now()
        ])->save();

        HandbookRegion::firstOrNew([
            'name' => 'Мангистауская область',
            'handbook_country_id' => 1,
            'created_at' => now()
        ])->save();

        HandbookRegion::firstOrNew([
            'name' => 'Кызылординксая область',
            'handbook_country_id' => 1,
            'created_at' => now()
        ])->save();
    }
}
