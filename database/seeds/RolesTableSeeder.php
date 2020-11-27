<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'guard_name' => 'web',
                'created_at' => '2020-11-16 17:35:53',
                'updated_at' => '2020-11-16 17:35:53',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'User',
                'guard_name' => 'web',
                'created_at' => '2020-11-16 17:50:03',
                'updated_at' => '2020-11-16 17:50:03',
            ),
        ));
    }
}