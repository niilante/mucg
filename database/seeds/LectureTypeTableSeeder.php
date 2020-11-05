<?php

use App\LectureType;
use Illuminate\Database\Seeder;

class LectureTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lectureTypes = [
            [
                'id'         => 1,
                'name'      => 'lecture Type for Normal Lecture',
                'code'      => 'norlec',
                'description' => '',
                'added_by_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 2,
                'name'      => 'lecture Type for Tutorial',
                'code'      => 'tutorial',
                'description' => 'lecture Type for Tutorial',
                'added_by_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 3,
                'name'      => 'lecture Type for Laboratory',
                'code'      => 'laboratory',
                'description' => 'lecture Type for Laboratory',
                'added_by_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 4,
                'name'      => 'lecture Type for Practical',
                'code'      => 'practical',
                'description' => 'lecture Type for Practical',
                'added_by_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        LectureType::insert($lectureTypes);
    }
}
