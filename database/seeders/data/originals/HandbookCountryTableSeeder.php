<?php

namespace Database\Seeders\data\originals;

use App\Models\HandbookCountry;
use Illuminate\Database\Seeder;

class HandbookCountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(HandbookCountry::all()->count() > 0){
            return;
        }
        HandbookCountry::firstOrNew([
            'name' => 'Казахстан',
            'created_at' => now()
        ])->save();


        HandbookCountry::firstOrNew([
            'name' => 'Россия',
            'created_at' => now()
        ])->save();


        HandbookCountry::firstOrNew([
            'name' => 'Узбекистан',
            'created_at' => now()
        ])->save();


        HandbookCountry::firstOrNew([
            'name' => 'Киргизстан',
            'created_at' => now()
        ])->save();
    }
}
