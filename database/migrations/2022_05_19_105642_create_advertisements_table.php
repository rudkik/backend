<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('handbook_advertisement_type_id')->comment('Тип объявления')
                ->constrained('handbook_advertisement_types')
                ->cascadeOnDelete();
            $table->foreignId('handbook_advertisement_category_id')->comment('Категория объявления')
                ->constrained('handbook_advertisement_categories')
                ->cascadeOnDelete();
            $table->foreignId('handbook_crop_category_id')->nullable()->comment('Категория культуры')->constrained('handbook_crop_categories');
            $table->foreignId('handbook_crop_id')->constrained('handbook_crops');
            $table->foreignId('handbook_elevator_id')->nullable()->comment('Элеватор/база')
                ->constrained('handbook_elevators')
                ->cascadeOnDelete();
            $table->foreignId('handbook_country_id')->nullable()->constrained('handbook_countries');
            $table->foreignId('handbook_region_id')->nullable()->constrained('handbook_regions');
            $table->foreignId('handbook_city_id')->nullable()->constrained('handbook_cities');
            $table->foreignId('handbook_crop_type_id')->constrained('handbook_crop_types')->cascadeOnDelete();
            $table->string('shipment')->nullable()->comment('Поставка');
            $table->integer('crop_year')->nullable()->comment('Дата урожая(год)');
            $table->float('moisture')->nullable()->comment('Влажность в %');
            $table->float('weed_impurity')->nullable()->comment('Сорная примесь в %');
            $table->foreignId('handbook_crop_color_id')->nullable()->comment('Цвет')
                ->constrained('handbook_crop_colors')
                ->cascadeOnDelete();
            $table->float('pest_infestation')->nullable()->comment('Зараженность вредителями в %');
            $table->text('comment_infestation')->nullable()->comment('Комментарии к зараженности');
            $table->integer('min_batch')->comment('Мин партия(тонн)');
            $table->integer('max_batch')->comment('Макся партия(тонн)');
            $table->float('protein_mass')->nullable()->comment('Массовая доля белка %');
            $table->float('nature')->nullable()->comment('Натура г/л');
            $table->float('grain_impurity')->nullable()->comment('Зерновая примесь в %');
            $table->float('falls_number')->nullable()->comment('Число падения(сек)');
            $table->float('glassiness')->nullable()->comment('Стекловидность в %');
            $table->foreignId('handbook_smell_id')->nullable()->comment('Запах')
                ->constrained('handbook_smells')
                ->cascadeOnDelete();
            $table->float('idk')->nullable()->comment('Индекс деформации клейковины');
            $table->float('gluten')->nullable()->comment('Клейковина в %');
            $table->text('advertisement_text')->nullable()->comment('Текст объявления');
            $table->float('price')->comment('Цена за тонну');
            $table->string('slug')->unique()->nullable()->comment('Ссылка');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
