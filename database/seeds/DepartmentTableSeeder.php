<?php

use App\Department;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            [
                'id'         => 1,
                'name'      => 'Department of Business Administration',
                'code'      => 'doba',
                'description' => '',
                'added_by_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 2,
                'name'      => 'Department of Science',
                'code'      => 'dosc',
                'description' => 'Department of Science',
                'added_by_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 3,
                'name'      => 'Department of Arts and Social Sciences',
                'code'      => 'doaass',
                'description' => 'Department of Arts and Social Sciences',
                'added_by_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 4,
                'name'      => 'Department of Information Technology',
                'code'      => 'doit',
                'description' => 'Department of Information Technology',
                'added_by_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        Department::insert($departments);
    }
}
