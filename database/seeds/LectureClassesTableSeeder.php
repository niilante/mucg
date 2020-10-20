<?php

use App\LectureClass;
use Illuminate\Database\Seeder;

class LectureClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            [
                'id'         => 1,
                'name'       => 'First class',
                'capacity'       => 100,
                'department_id' =>  1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 2,
                'name'       => 'Second class',
                'capacity'       => 50,
                'department_id' =>  2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 3,
                'name'       => 'Third class',
                'capacity'       => 70,
                'department_id' =>  3,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 4,
                'name'       => 'Forth class',
                'capacity'       => 90,
                'department_id' =>  4,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 5,
                'name'       => 'Fifth class',
                'capacity'       => 30,
                'department_id' =>  2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        ];

        LectureClass::insert($classes);
    }
}
