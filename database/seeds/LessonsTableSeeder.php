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
                'lecturer_id' => 5,
                'class_id'   => 1,
                'weekday'    => 1,
                'weekname'    => null,
                'code'    => 'mdit231',
                'title'    => 'MDIT231',
                'duration' => 120,
                'department_id'  => 1,
                'lecture_hall_id'  => null,
                'description'    => 'This is the lesson for computer science',
                'start_time' => null,
                'end_time'   => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 2,
                'lecturer_id' => 6,
                'class_id'   => 1,
                'weekday'    => 1,
                'weekname'    => null,
                'code'    => 'mdit232',
                'title'    => 'MDIT232',
                'duration' => 180,
                'department_id'  => 1,
                'lecture_hall_id'  => null,
                'description'    => 'This is the lesson for computer science',
                'start_time' => null,
                'end_time'   => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 3,
                'lecturer_id' => 4,
                'class_id'   => 1,
                'weekday'    => 1,
                'weekname'    => null,
                'code'    => 'mdit233',
                'title'    => 'MDIT233',
                'duration' => 90,
                'department_id'  => 1,
                'lecture_hall_id'  => null,
                'description'    => 'This is the lesson for computer science',
                'start_time' => null,
                'end_time'   => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 4,
                'lecturer_id' => 3,
                'class_id'   => 2,
                'weekday'    => 1,
                'weekname'    => null,
                'code'    => 'mdit234',
                'title'    => 'MDIT234',
                'duration' => 60,
                'department_id'  => 1,
                'lecture_hall_id'  => null,
                'description'    => 'This is the lesson for computer science',
                'start_time' => null,
                'end_time'   => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 5,
                'lecturer_id' => 3,
                'class_id'   => 1,
                'weekday'    => 2,
                'weekname'    => null,
                'code'    => 'mdit230',
                'title'    => 'MDIT230',
                'duration' => 30,
                'department_id'  => 1,
                'lecture_hall_id'  => null,
                'description'    => 'This is the lesson for computer science',
                'start_time' => null,
                'end_time'   => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 6,
                'lecturer_id' => 5,
                'class_id'   => 1,
                'weekday'    => 2,
                'weekname'    => null,
                'code'    => 'mdit235',
                'title'    => 'MDIT235',
                'duration' => 120,
                'department_id'  => 1,
                'lecture_hall_id'  => null,
                'description'    => 'This is the lesson for computer science',
                'start_time' => null,
                'end_time'   => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 7,
                'lecturer_id' => 4,
                'class_id'   => 1,
                'weekday'    => 2,
                'weekname'    => null,
                'code'    => 'mdit236',
                'title'    => 'MDIT236',
                'duration' => 30,
                'department_id'  => 1,
                'lecture_hall_id'  => null,
                'description'    => 'This is the lesson for computer science',
                'start_time' => null,
                'end_time'   => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 8,
                'lecturer_id' => 6,
                'class_id'   => 1,
                'weekday'    => 3,
                'weekname'    => null,
                'code'    => 'mdit237',
                'title'    => 'MDIT237',
                'duration' => 180,
                'department_id'  => 1,
                'lecture_hall_id'  => null,
                'description'    => 'This is the lesson for computer science',
                'start_time' => null,
                'end_time'   => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 9,
                'lecturer_id' => 2,
                'class_id'   => 1,
                'weekday'    => 3,
                'weekname'    => null,
                'code'    => 'mdit238',
                'title'    => 'MDIT238',
                'duration' => 120,
                'department_id'  => 1,
                'lecture_hall_id'  => null,
                'description'    => 'This is the lesson for computer science',
                'start_time' => null,
                'end_time'   => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 10,
                'lecturer_id' => 3,
                'class_id'   => 1,
                'weekday'    => 3,
                'weekname'    => null,
                'code'    => 'mdit239',
                'title'    => 'MDIT239',
                'duration' => 90,
                'department_id'  => 1,
                'lecture_hall_id'  => null,
                'description'    => 'This is the lesson for computer science',
                'start_time' => null,
                'end_time'   => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 11,
                'lecturer_id' => 2,
                'class_id'   => 1,
                'weekday'    => 4,
                'weekname'    => null,
                'code'    => 'mdit240',
                'title'    => 'MDIT240',
                'duration' => 120,
                'department_id'  => 1,
                'lecture_hall_id'  => null,
                'description'    => 'This is the lesson for computer science',
                'start_time' => null,
                'end_time'   => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 12,
                'lecturer_id' => 3,
                'class_id'   => 1,
                'weekday'    => 4,
                'weekname'    => null,
                'code'    => 'mdit241',
                'title'    => 'MDIT241',
                'duration' => 90,
                'department_id'  => 1,
                'lecture_hall_id'  => null,
                'description'    => 'This is the lesson for computer science',
                'start_time' => null,
                'end_time'   => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 13,
                'lecturer_id' => 4,
                'class_id'   => 1,
                'weekday'    => 4,
                'weekname'    => null,
                'code'    => 'mdit564',
                'title'    => 'MDIT564',
                'duration' => 60,
                'department_id'  => 1,
                'lecture_hall_id'  => null,
                'description'    => 'This is the lesson for computer science',
                'start_time' => null,
                'end_time'   => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 14,
                'lecturer_id' => 3,
                'class_id'   => 1,
                'weekday'    => 5,
                'weekname'    => null,
                'code'    => 'mdit875',
                'title'    => 'MDIT875',
                'duration' => 30,
                'department_id'  => 1,
                'lecture_hall_id'  => null,
                'description'    => 'This is the lesson for computer science',
                'start_time' => null,
                'end_time'   => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 15,
                'lecturer_id' => 2,
                'class_id'   => 1,
                'weekday'    => 5,
                'weekname'    => null,
                'code'    => 'mdit354',
                'title'    => 'MDIT354',
                'duration' => 60,
                'department_id'  => 1,
                'lecture_hall_id'  => null,
                'description'    => 'This is the lesson for computer science',
                'start_time' => null,
                'end_time'   => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 16,
                'lecturer_id' => 6,
                'class_id'   => 1,
                'weekday'    => 5,
                'weekname'    => null,
                'code'    => 'mdit431',
                'title'    => 'MDIT431',
                'duration' => 180,
                'department_id'  => 1,
                'lecture_hall_id'  => null,
                'description'    => 'This is the lesson for computer science',
                'start_time' => null,
                'end_time'   => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        Lesson::insert($lessons);
    }
}
