<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleSupportSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        DB::table('roles')->insert(
            [
                [
                    'name' => 'support',
                    'role_type' => 'support',
                    'guard_name' => 'web',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }

}
