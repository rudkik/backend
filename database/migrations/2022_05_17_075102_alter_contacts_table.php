<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropConstrainedForeignId('location_city_id');
            $table->dropColumn('address');
            $table->dropColumn('map');
            $table->dropColumn('position');
            $table->dropColumn('is_active');
            $table->string('email')->comment('Email')->after('id');
            $table->string('instagram_link')->comment('Инстаграм')->after('email');
            $table->string('telegram_link')->comment('Телеграм')->after('instagram_link');
            $table->string('whatsapp_link')->comment('Ватсапп')->after('telegram_link');
            $table->text('signature')->comment('Подпись')->after('whatsapp_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
