<?php

use Illuminate\Database\Seeder;

class GlobalSettingsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('global_settings')->insert([
            [
                'name' => 'sitename',
                'value' => 'Swap test',
                'field_type' => 1
            ],
            [
                'name' => 'logo',
                'value' => 'logo_name',
                'field_type' => 3
            ],
            [
                'name' => 'email',
                'value' => 'test@email.com',
                'field_type' => 1
            ],
            [
                'name' => 'copyright',
                'value' => 'Ⓒ 2018 Test Project',
                'field_type' => 2
            ],
        ]);
    }

}
