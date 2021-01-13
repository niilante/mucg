<?php

use Illuminate\Database\Seeder;

class LessonStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lesson_statuses')->truncate();

        DB::table('lesson_statuses')->insert([
            'name'   =>  'Initiated',
            'description'   =>  'This is for lesson status for initiated',
            'code'   =>  'initiated',
            'added_by_id'   =>  1,
            'is_active' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('lesson_statuses')->insert([
            'name'   =>  'Pending',
            'description'   =>  'This is for lesson status for pedning',
            'code'   =>  'pending',
            'added_by_id'   =>  1,
            'is_active' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('lesson_statuses')->insert([
            'name'   =>  'Approved',
            'description'   =>  'This is for lesson status for approved',
            'code'   =>  'approved',
            'added_by_id'   =>  1,
            'is_active' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
