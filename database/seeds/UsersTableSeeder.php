<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Mudit Gulgulia',
                'email' => 'gulgulia17@gmail.com',
                'username' => 'gulgulia17',
                'number' => '8890070352',
                'email_verified_at' => '2020-11-27 00:00:00',
                'password' => '$2y$10$VcbOY0PSo8U62azgGWzuy.ExOInNMso0HpCpqXbr3BdMGadiC5qVe',
                'remember_token' => NULL,
                'created_at' => '2020-11-27 00:00:00',
                'updated_at' => '2020-11-27 00:00:00',
                'deleted_at' => NULL,
            ),
        ));
    }
}
