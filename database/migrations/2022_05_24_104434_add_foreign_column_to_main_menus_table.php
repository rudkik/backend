<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignColumnToMainMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('main_menus', function (Blueprint $table) {
            $table->foreignId('handbook_menu_type_id')->nullable()->constrained('handbook_menu_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('main_menus', function (Blueprint $table) {
            //
        });
    }
}
