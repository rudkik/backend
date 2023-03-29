<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHandbookCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('handbook_cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('handbook_country_id')->constrained('handbook_countries');
            $table->foreignId('handbook_region_id')->constrained('handbook_regions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('handbook_cities');
    }
}
