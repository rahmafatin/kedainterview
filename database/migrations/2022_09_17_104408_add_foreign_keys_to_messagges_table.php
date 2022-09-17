<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMessaggesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messagges', function (Blueprint $table) {
            //
            $table->foreign('sender_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('SET NULL');
            $table->foreign('receiver_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messagges', function (Blueprint $table) {
            //
        });
    }
}
