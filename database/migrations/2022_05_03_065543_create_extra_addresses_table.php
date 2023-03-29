<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('bin');
            $table->string('company_name');
            $table->string('company_website');
            $table->foreignId('handbook_company_type_id')->constrained('handbook_company_types');
            $table->integer('whatsapp');
            $table->integer('telegram');
            $table->string('about_company');
            $table->foreignId('user_id')->references('id')->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('extra_addresses');
    }
}
