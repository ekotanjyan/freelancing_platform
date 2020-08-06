<?php
/**
 * Class ModelRoleSupportSeeder
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class ModelRoleSeeder
 */
class ModelRoleSupportSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_has_roles')->insert(
            [
                //Support
                [
                    'role_id' => '4',
                    'model_id' => '25',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '4',
                    'model_id' => '26',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '4',
                    'model_id' => '27',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '4',
                    'model_id' => '28',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '4',
                    'model_id' => '29',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '4',
                    'model_id' => '30',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '4',
                    'model_id' => '31',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '4',
                    'model_id' => '32',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '4',
                    'model_id' => '33',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '4',
                    'model_id' => '34',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '4',
                    'model_id' => '35',
                    'model_type' => 'App\User',
                ],
                [
                    'role_id' => '4',
                    'model_id' => '36',
                    'model_type' => 'App\User',
                ],
            ]
        );
    }
}
