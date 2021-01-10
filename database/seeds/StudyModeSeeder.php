<?php

use Illuminate\Database\Seeder;

class StudyModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study_modes')->truncate();

        DB::table('study_modes')->insert([
            'name'   =>  'Regular',
            'description'   =>  'Regular Study Mode',
            'code'   =>  'REG',
            'added_by_id'   =>  1,
            'is_active' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('study_modes')->insert([
            'name'   =>  'Evening',
            'description'   =>  'Evening Study Mode',
            'code'   =>  'EVN',
            'added_by_id'   =>  1,
            'is_active' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('study_modes')->insert([
            'name'   =>  'Weekend',
            'description'   =>  'Weekend Study Mode',
            'code'   =>  'WKD',
            'added_by_id'   =>  1,
            'is_active' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('study_modes')->insert([
            'name'   =>  'Distance',
            'description'   =>  'Distance Study Mode',
            'code'   =>  'DST',
            'added_by_id'   =>  1,
            'is_active' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
