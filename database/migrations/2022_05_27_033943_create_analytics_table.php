<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalyticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analytics', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Заголовок');
            $table->text('subtitle')->comment('Подзаголовок');
            $table->text('description')->comment('Описание');
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
        Schema::dropIfExists('analytics');
    }
}
