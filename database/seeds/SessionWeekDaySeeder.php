<?php

use App\SessionWeekDay;
use Illuminate\Database\Seeder;

class SessionWeekDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $session_week_days = [
            [
                'id'         => 1,
                'name'      => 'Morning',
                'code'      => 'morning',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 2,
                'name'      => 'Evening',
                'code'      => 'evening',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => 3,
                'name'      => 'Weekend',
                'code'      => 'weekend',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        SessionWeekDay::insert($session_week_days);
    }
}
