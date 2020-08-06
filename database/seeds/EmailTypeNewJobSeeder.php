<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EmailTypeNewJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('email_types')->insert(
          [
              // freelancers
              [
                  'role_id' => 3,
                  'email_type' => 25,
                  'variables' => '',
                  'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                  'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
              ],
              // support
              [
                  'role_id' => 4,
                  'email_type' => 26,
                  'variables' => '',
                  'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                  'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
              ],
          ]
      );
    }
}
