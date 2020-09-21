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
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 2,
                'name'       => 'Second class',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        ];

        LectureClass::insert($classes);
    }
}
