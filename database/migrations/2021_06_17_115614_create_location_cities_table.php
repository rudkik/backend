<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationCitiesTable extends Migration
{
    private const TABLE_NAME = 'location_cities';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Название');
            $table->foreignId('location_country_id')
                ->comment('Локация: страна')
                ->constrained('location_countries')
                ->cascadeOnDelete();
            $table->integer('position')->default(0)->comment('Позиция');
            $table->boolean('is_active')->default(false)->comment('Активность');
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
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
