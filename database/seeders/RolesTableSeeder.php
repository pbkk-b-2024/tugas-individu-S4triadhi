<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert roles into the roles table
        DB::table('roles')->insert([
            ['name' => 'Admin'],
            ['name' => 'Member'],
        ]);
    }
}
