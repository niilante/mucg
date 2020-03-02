<?php

use App\Lesson;
use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lessons = [
            [
                'id'         => 1,
                'teacher_id' => 5,
                'class_id'   => 1,
                'weekday'    => 1,
                'start_time' => '10:00',
                'end_time'   => '12:00',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 2,
                'teacher_id' => 6,
                'class_id'   => 1,
                'weekday'    => 1,
                'start_time' => '12:00',
                'end_time'   => '14:00',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 3,
                'teacher_id' => 4,
                'class_id'   => 1,
                'weekday'    => 1,
                'start_time' => '14:00',
                'end_time'   => '16:00',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 4,
                'teacher_id' => 3,
                'class_id'   => 2,
                'weekday'    => 1,
                'start_time' => '14:00',
                'end_time'   => '16:00',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 5,
                'teacher_id' => 3,
                'class_id'   => 1,
                'weekday'    => 2,
                'start_time' => '08:00',
                'end_time'   => '10:00',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 6,
                'teacher_id' => 5,
                'class_id'   => 1,
                'weekday'    => 2,
                'start_time' => '10:00',
                'end_time'   => '12:00',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 7,
                'teacher_id' => 4,
                'class_id'   => 1,
                'weekday'    => 2,
                'start_time' => '12:00',
                'end_time'   => '14:00',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 8,
                'teacher_id' => 6,
                'class_id'   => 1,
                'weekday'    => 3,
                'start_time' => '10:00',
                'end_time'   => '12:00',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 9,
                'teacher_id' => 2,
                'class_id'   => 1,
                'weekday'    => 3,
                'start_time' => '12:00',
                'end_time'   => '14:00',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 10,
                'teacher_id' => 3,
                'class_id'   => 1,
                'weekday'    => 3,
                'start_time' => '14:00',
                'end_time'   => '16:00',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 11,
                'teacher_id' => 2,
                'class_id'   => 1,
                'weekday'    => 4,
                'start_time' => '10:00',
                'end_time'   => '12:00',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 12,
                'teacher_id' => 3,
                'class_id'   => 1,
                'weekday'    => 4,
                'start_time' => '12:00',
                'end_time'   => '14:00',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 13,
                'teacher_id' => 4,
                'class_id'   => 1,
                'weekday'    => 4,
                'start_time' => '14:00',
                'end_time'   => '16:00',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 14,
                'teacher_id' => 3,
                'class_id'   => 1,
                'weekday'    => 5,
                'start_time' => '08:00',
                'end_time'   => '10:00',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 15,
                'teacher_id' => 2,
                'class_id'   => 1,
                'weekday'    => 5,
                'start_time' => '10:00',
                'end_time'   => '12:00',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 16,
                'teacher_id' => 6,
                'class_id'   => 1,
                'weekday'    => 5,
                'start_time' => '12:00',
                'end_time'   => '14:00',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        Lesson::insert($lessons);
    }
}
