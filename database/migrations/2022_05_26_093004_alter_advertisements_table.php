<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->dropColumn('handbook_country_id');
            $table->dropColumn('handbook_region_id');
        });
        Schema::table('handbook_cities', function (Blueprint $table) {
            $table->dropColumn('handbook_country_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->foreignId('handbook_country_id')->nullable()->constrained('handbook_countries');
            $table->foreignId('handbook_region_id')->nullable()->constrained('handbook_regions');
        });
        Schema::table('handbook_cities', function (Blueprint $table) {
            $table->foreignId('handbook_country_id')->constrained('handbook_countries');
        });
    }
}
