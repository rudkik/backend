<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUniqueColumnOnUserLegalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_legals', function (Blueprint $table) {
            $table->renameIndex('user_legals_company_link_unique', 'user_legals_company_website_unique');
            $table->renameIndex('user_legals_whatsapp_link_unique', 'user_legals_whatsapp_unique');
            $table->renameIndex('user_legals_telegram_link_unique', 'user_legals_telegram_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
        {
        Schema::table('user_legals', function (Blueprint $table) {
            $table->renameIndex('user_legals_company_website_unique', 'user_legals_company_link_unique');
            $table->renameIndex('user_legals_whatsapp_unique', 'user_legals_whatsapp_link_unique');
            $table->renameIndex('user_legals_telegram_unique', 'user_legals_telegram_link_unique');
        });
    }
}
