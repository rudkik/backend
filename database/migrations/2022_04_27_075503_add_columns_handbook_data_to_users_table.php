<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsHandbookDataToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('handbook_country_id')->nullable()->constrained('handbook_countries');
            $table->foreignId('handbook_region_id')->nullable()->constrained('handbook_regions');
            $table->foreignId('handbook_city_id')->nullable()->constrained('handbook_cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('handbook_country_id');
            $table->dropConstrainedForeignId('handbook_region_id');
            $table->dropConstrainedForeignId('handbook_city_id');
        });
    }
}
