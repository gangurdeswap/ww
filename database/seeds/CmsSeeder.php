<?php

use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('cms_pages')->insert([
            'page_name' => 'term-and-condition',
        ]);
        DB::table('cms_pages')->insert([
            'page_name' => 'privacy-policy',
        ]);
        DB::table('cms_pages')->insert([
            'page_name' => 'about-us',
        ]);
    }

}
