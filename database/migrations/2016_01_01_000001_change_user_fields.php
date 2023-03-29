<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class ChangeUserFields extends Migration
{
    private const TABLE_NAME = 'users';

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table(self::TABLE_NAME, function ($table) {
            if (!Schema::hasColumn(self::TABLE_NAME, 'avatar')) {
                $table->string('avatar')->nullable()->after('email');
            } else {
                $table->string('avatar')->default(null)->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {

    }
}
