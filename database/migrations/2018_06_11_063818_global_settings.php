<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GlobalSettings extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('global_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('value', 255);
            $table->enum('field_type', ['1', '2', '3'])->comment('1=>input, 2=>textarea, 3=>file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('global_settings');
    }

}
