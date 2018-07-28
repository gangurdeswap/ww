<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFirstNameToUserTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        if (Schema::hasColumn('users', 'name')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('name');
            });
        }

        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name', 255)->after('id');
            $table->string('last_name', 255)->after('first_name');
            $table->enum('user_type', ['0', '1'])->default('0')->comment("0=>Admin, 1=>User")->after('last_name');
            $table->enum('user_status', ['0', '1', '2'])->default('0')->comment("0=>Inactive, 1=>Active, 2=>Blocked")->after('user_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        if (Schema::hasColumn('users', 'name')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('name');
            });
        }

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('user_type');
            $table->dropColumn('user_status');
        });
    }

}
