<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLegalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_legals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->comment('ID пользователя')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->string('bin')->unique()->comment('БИН');
            $table->string('company')->unique()->comment('Название компании');
            $table->string('company_link')->unique()->nullable()->comment('Ссылка на сайт компании');
            $table->string('whatsapp_link')->unique()->nullable()->comment('Ссылка на ватсапп');
            $table->string('telegram_link')->unique()->nullable()->comment('Ссылка на телеграм');
            $table->string('about_company')->unique()->nullable()->comment('О компании');
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
        Schema::dropIfExists('user_legals');
    }
}
