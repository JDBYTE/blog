<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->string('phone')->after('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *S
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
               $table->dropcolumn('phone');
        });
    }
}
