<?php

namespace Database\Seeders\data\originals;

use App\Models\HandbookSmell;
use Illuminate\Database\Seeder;

class HandbookSmellTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(HandbookSmell::all()->count() > 0){
            return;
        }
        HandbookSmell::firstOrNew(['name' => 'Без запаха'])->save();
        HandbookSmell::firstOrNew(['name' => 'Плесневелый'])->save();
        HandbookSmell::firstOrNew(['name' => 'Солодовый'])->save();
        HandbookSmell::firstOrNew(['name' => 'Полынь'])->save();
        HandbookSmell::firstOrNew(['name' => 'Затхлый'])->save();
        HandbookSmell::firstOrNew(['name' => 'Амбарный'])->save();
        HandbookSmell::firstOrNew(['name' => 'Кислый'])->save();
        HandbookSmell::firstOrNew(['name' => 'Головневой'])->save();
    }
}
