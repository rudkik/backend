<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserLegalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_legals', function (Blueprint $table) {
           $table->renameColumn('company_link', 'company_website');
           $table->renameColumn('whatsapp_link', 'whatsapp');
           $table->renameColumn('telegram_link', 'telegram');
           $table->foreignId('handbook_company_type_id')->constrained('handbook_company_types');
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
