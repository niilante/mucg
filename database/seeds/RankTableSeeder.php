<?php

use App\Rank;
use Illuminate\Database\Seeder;

class RankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ranks = [
            [
                'id'         => 1,
                'name'      => 'Professor',
                'code'      => 'profes',
                'description' => 'This is a professor',
                'credit_hours' => '9',
                'added_by_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 2,
                'name'      => 'Associate Professor',
                'code'      => 'asprof',
                'description' => 'This is an Associate Professor',
                'credit_hours' => '9',
                'added_by_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 3,
                'name'      => 'Senior Lecturer',
                'code'      => 'select',
                'description' => 'This is a Senior Lecturer',
                'credit_hours' => '12',
                'added_by_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 4,
                'name'      => 'Lecturer',
                'code'      => 'lectur',
                'description' => 'This is a Lecturer',
                'credit_hours' => '12',
                'added_by_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 5,
                'name'      => 'Assistant Lecturer',
                'code'      => 'aslect',
                'description' => 'This is an Assistant Lecturer',
                'credit_hours' => '12',
                'added_by_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 6,
                'name'      => 'Teaching Assistant',
                'code'      => 'teassi',
                'description' => 'This is a Teaching Assistant',
                'credit_hours' => '16',
                'added_by_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        Rank::insert($ranks);
    }
}
