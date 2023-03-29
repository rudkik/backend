<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHandbookRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('handbook_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название');
            $table->string('description')->comment('Описание');
            $table->string('document')->comment('Документ');
            $table->integer('sum')->comment('Сумма');
            $table->integer('request_number')->comment('Номер завки');
            $table->string('slug')->comment('Слаг');
            $table->foreignId('handbook_request_subject_id')
                ->comment('Справочник: тематики заявок')
                ->constrained('handbook_request_subjects')
                ->cascadeOnDelete();
            $table->boolean('is_active')->default(false)->comment('Активность');
            $table->timestamps();
        });

        Schema::create('ref_location_cities_handbook_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_city_id')
                ->comment('Локация: города')
                ->constrained('location_cities')
                ->cascadeOnDelete();
            $table->foreignId('handbook_request_id')
                ->comment('Заявка')
                ->constrained('handbook_requests')
                ->cascadeOnDelete();
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
        Schema::dropIfExists('ref_location_cities_handbook_requests');
        Schema::dropIfExists('handbook_requests');
    }
}
