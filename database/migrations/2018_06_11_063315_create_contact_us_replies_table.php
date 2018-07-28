<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsRepliesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('contact_us_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_us_id')->unsigned();
            $table->longText('reply_text');
            $table->timestamps();
            $table->foreign('contact_us_id')->references('id')->on('contact_us')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('contact_us_replies');
    }

}
