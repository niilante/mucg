<?php

use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->truncate();

        DB::table('genders')->insert([
            'name'   =>  'Male',
            'description'   =>  'This is for male users',
            'code'   =>  'male',
            'added_by_id'   =>  1,
            'is_active' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('genders')->insert([
            'name'   =>  'Female',
            'description'   =>  'This is for female users',
            'code'   =>  'female',
            'added_by_id'   =>  1,
            'is_active' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('genders')->insert([
            'name'   =>  'Other',
            'description'   =>  'This is for other users',
            'code'   =>  'other',
            'added_by_id'   =>  1,
            'is_active' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
