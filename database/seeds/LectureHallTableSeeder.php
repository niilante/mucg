<?php

use App\LectureHall;
use Illuminate\Database\Seeder;

class LectureHallTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lecture_halls = [
            [
                'id'         => 1,
                'name'      => 'First Floor Room One',
                'code'      => 'ffro',
                'description' => 'This is First Floor Room One',
                'capacity' => 100,
                'added_by_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 2,
                'name'      => 'First Floor Room Two',
                'code'      => 'ffrtw',
                'description' => 'This is First Floor Room Two',
                'capacity' => 40,
                'added_by_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 3,
                'name'      => 'First Floor Room Three',
                'code'      => 'ffrth',
                'description' => 'This is First Floor Room Three',
                'capacity' => 50,
                'added_by_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 4,
                'name'      => 'First Floor Room Four',
                'code'      => 'ffrfo',
                'description' => 'First Floor Room Four',
                'capacity' => 60,
                'added_by_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        LectureHall::insert($lecture_halls);
    }
}
