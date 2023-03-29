<?php


namespace Database\Seeders\data\originals;


use App\Models\HandbookMenuType;
use Illuminate\Database\Seeder;

class HandbookMenuTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(HandbookMenuType::all()->count() > 0){
            return;
        }
        HandbookMenuType::firstOrNew(['name' => 'burger'])->save();
        HandbookMenuType::firstOrNew(['name' => 'footer'])->save();
    }
}
