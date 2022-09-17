<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessaggesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messagges', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->unsignedBigInteger('sender_id')->index('messages_sender_id_foreign');
            $table->unsignedBigInteger('receiver_id')->index('messages_receiver_id_foreign');
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
        Schema::dropIfExists('messagges');
    }
}
