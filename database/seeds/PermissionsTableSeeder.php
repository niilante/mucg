<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],

            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],

            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],

            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],

            [
                'id'    => '17',
                'title' => 'lesson_create',
            ],
            [
                'id'    => '18',
                'title' => 'lesson_edit',
            ],
            [
                'id'    => '19',
                'title' => 'lesson_show',
            ],
            [
                'id'    => '20',
                'title' => 'lesson_delete',
            ],
            [
                'id'    => '21',
                'title' => 'lesson_access',
            ],

            [
                'id'    => '22',
                'title' => 'lecture_class_create',
            ],
            [
                'id'    => '23',
                'title' => 'lecture_class_edit',
            ],
            [
                'id'    => '24',
                'title' => 'lecture_class_show',
            ],
            [
                'id'    => '25',
                'title' => 'lecture_class_delete',
            ],
            [
                'id'    => '26',
                'title' => 'lecture_class_access',
            ],

            [
                'id'    => '27',
                'title' => 'department_create',
            ],
            [
                'id'    => '28',
                'title' => 'department_edit',
            ],
            [
                'id'    => '29',
                'title' => 'department_show',
            ],
            [
                'id'    => '30',
                'title' => 'department_delete',
            ],
            [
                'id'    => '31',
                'title' => 'department_access',
            ],

            [
                'id'    => '32',
                'title' => 'rank_create',
            ],
            [
                'id'    => '33',
                'title' => 'rank_edit',
            ],
            [
                'id'    => '34',
                'title' => 'rank_show',
            ],
            [
                'id'    => '35',
                'title' => 'rank_delete',
            ],
            [
                'id'    => '36',
                'title' => 'rank_access',
            ],

            [
                'id'    => '37',
                'title' => 'lecture_hall_create',
            ],
            [
                'id'    => '38',
                'title' => 'lecture_hall_edit',
            ],
            [
                'id'    => '39',
                'title' => 'lecture_hall_show',
            ],
            [
                'id'    => '40',
                'title' => 'lecture_hall_delete',
            ],
            [
                'id'    => '41',
                'title' => 'lecture_hall_access',
            ],

            [
                'id'    => '42',
                'title' => 'lecture_hall_resource_create',
            ],
            [
                'id'    => '43',
                'title' => 'lecture_hall_resource_edit',
            ],
            [
                'id'    => '44',
                'title' => 'lecture_hall_resource_show',
            ],
            [
                'id'    => '45',
                'title' => 'lecture_hall_resource_delete',
            ],
            [
                'id'    => '46',
                'title' => 'lecture_hall_resource_access',
            ],

            [
                'id'    => '47',
                'title' => 'lecture_type_create',
            ],
            [
                'id'    => '48',
                'title' => 'lecture_type_edit',
            ],
            [
                'id'    => '49',
                'title' => 'lecture_type_show',
            ],
            [
                'id'    => '50',
                'title' => 'lecture_type_delete',
            ],
            [
                'id'    => '51',
                'title' => 'lecture_type_access',
            ],

            [
                'id'    => '52',
                'title' => 'position_create',
            ],
            [
                'id'    => '53',
                'title' => 'position_edit',
            ],
            [
                'id'    => '54',
                'title' => 'position_show',
            ],
            [
                'id'    => '55',
                'title' => 'position_delete',
            ],
            [
                'id'    => '56',
                'title' => 'position_access',
            ],
            [
                'id'    => '19',
                'title' => 'lesson_schedule',
            ],
        ];

        Permission::insert($permissions);
    }
}
