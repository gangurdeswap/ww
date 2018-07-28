<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'first_name' => 'swapnil',
            'last_name' => 'swapnil',
            'email' => 'swapnil@gmail.com',
            'password' => bcrypt('Pass@123'),
        ]);
    }

}
