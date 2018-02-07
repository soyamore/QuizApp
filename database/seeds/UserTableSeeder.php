<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        DB::table('users')->truncate();

        DB::table('users')->insert(
            [
              'name'     => 'admin',
              'username' => 'admin',
              'password' => bcrypt('admin'),
            ]
        );

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
