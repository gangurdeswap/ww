<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsLangTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cms_pages_langs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cms_page_id')->unsigned();
            $table->string('page_title');
            $table->longText('page_content');
            $table->string('lang_id');
            $table->timestamps();
            $table->foreign('cms_page_id')->references('id')->on('cms_pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('cms_pages_langs');
    }

}
