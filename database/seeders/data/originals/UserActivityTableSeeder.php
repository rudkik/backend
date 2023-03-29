<?php

namespace Database\Seeders\data\originals;

use App\Models\HandbookUserActivity;
use Illuminate\Database\Seeder;

class UserActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(HandbookUserActivity::all()->count() > 0){
            return;
        }
        HandbookUserActivity::firstOrNew(['name' => 'Производитель'])->save();
        HandbookUserActivity::firstOrNew(['name' => 'Трейдер'])->save();
    }
}
