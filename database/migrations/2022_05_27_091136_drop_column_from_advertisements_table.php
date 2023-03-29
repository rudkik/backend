<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnFromAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->dropColumn('handbook_crop_category_id');
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
            $table->foreignId('handbook_crop_category_id')->nullable()->constrained('handbook_crop_categories');
        });
    }
}
