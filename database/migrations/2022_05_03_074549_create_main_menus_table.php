<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainMenusTable extends Migration
{
    private const TABLE_NAME = 'main_menus';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Заголовок');
            $table->string('external_link')->nullable()->comment('Внешняя ссылка');
            $table->string('internal_link')->nullable()->comment('Внутренняя ссылка');
            $table->boolean('isExternal')->default(1)
                ->comment('Если true то внешняя ссылка, если false то внутренняя ссылка');
            $table->string('slug')->unique()->comment('Ссылка');
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
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
