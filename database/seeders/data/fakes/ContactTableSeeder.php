<?php

namespace Database\Seeders\data\fakes;

use App\Models\Contact;
use Database\Factories\ContactFactory;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Contact::all()->count() > 0){
            return;
        }

        Contact::factory()
            ->count(10)
            ->create();
    }
}
