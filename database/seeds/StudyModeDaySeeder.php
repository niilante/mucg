<?php

use Illuminate\Database\Seeder;

class StudyModeDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study_mode_days')->truncate();

        //#1 - regular mode
        DB::table('study_mode_days')->insert([
            'name' => 'Monday', 'week_day_id' =>  1, 'study_mode_id' =>  1, 'start_time' => "8:00", 'end_time' => "16:00",
            'added_by_id' =>  1, 'is_active' => 1, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('study_mode_days')->insert([
            'name' => 'Tuesday', 'week_day_id' =>  2, 'study_mode_id' =>  1, 'start_time' => "8:00", 'end_time' => "16:00",
            'added_by_id' =>  1, 'is_active' => 1, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('study_mode_days')->insert([
            'name' => 'Wednesday', 'week_day_id' =>  3, 'study_mode_id' =>  1, 'start_time' => "8:00", 'end_time' => "16:00",
            'added_by_id' =>  1, 'is_active' => 1, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('study_mode_days')->insert([
            'name' => 'Thursday', 'week_day_id' =>  4, 'study_mode_id' =>  1, 'start_time' => "8:00", 'end_time' => "16:00",
            'added_by_id' =>  1, 'is_active' => 1, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('study_mode_days')->insert([
            'name' => 'Friday', 'week_day_id' =>  5, 'study_mode_id' =>  1, 'start_time' => "8:00", 'end_time' => "15:00",
            'added_by_id' =>  1, 'is_active' => 1, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"),
        ]);

        
        
        //#2 - evening
        DB::table('study_mode_days')->insert([
            'name' => 'Monday', 'week_day_id' =>  1, 'study_mode_id' =>  2, 'start_time' => "17:00", 'end_time' => "21:00",
            'added_by_id' =>  1, 'is_active' => 1, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('study_mode_days')->insert([
            'name' => 'Tuesday', 'week_day_id' =>  2, 'study_mode_id' =>  2, 'start_time' => "17:00", 'end_time' => "21:00",
            'added_by_id' =>  1, 'is_active' => 1, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('study_mode_days')->insert([
            'name' => 'Wednesday', 'week_day_id' =>  3, 'study_mode_id' =>  2, 'start_time' => "17:00", 'end_time' => "21:00",
            'added_by_id' =>  1, 'is_active' => 1, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('study_mode_days')->insert([
            'name' => 'Thursday', 'week_day_id' =>  4, 'study_mode_id' =>  2, 'start_time' => "17:00", 'end_time' => "21:00",
            'added_by_id' =>  1, 'is_active' => 1, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('study_mode_days')->insert([
            'name' => 'Friday', 'week_day_id' =>  5, 'study_mode_id' =>  2, 'start_time' => "17:00", 'end_time' => "21:00",
            'added_by_id' =>  1, 'is_active' => 1, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"),
        ]);



        //#3 - weekend
        DB::table('study_mode_days')->insert([
            'name' => 'Friday', 'week_day_id' =>  5, 'study_mode_id' =>  3, 'start_time' => "17:00", 'end_time' => "21:00",
            'added_by_id' =>  1, 'is_active' => 1, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('study_mode_days')->insert([
            'name' => 'Saturday', 'week_day_id' =>  6, 'study_mode_id' =>  3, 'start_time' => "08:00", 'end_time' => "20:00",
            'added_by_id' =>  1, 'is_active' => 1, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('study_mode_days')->insert([
            'name' => 'Sunday', 'week_day_id' =>  7, 'study_mode_id' =>  3, 'start_time' => "08:00", 'end_time' => "20:00",
            'added_by_id' =>  1, 'is_active' => 1, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
