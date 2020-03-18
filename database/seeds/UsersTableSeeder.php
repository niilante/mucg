<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'img_url'        => 'assets/img/users/1.jpg',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'class_id'       => null,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 2,
                'name'           => 'Teacher',
                'email'          => 'teacher@teacher.com',
                'img_url'        => 'assets/img/users/2.jpg',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'class_id'       => null,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 3,
                'name'           => 'Teacher 2',
                'email'          => 'teacher2@teacher2.com',
                'img_url'        => 'assets/img/users/3.jpg',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'class_id'       => null,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 4,
                'name'           => 'Teacher 3',
                'email'          => 'teacher3@teacher3.com',
                'img_url'        => 'assets/img/users/4.jpg',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'class_id'       => null,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 5,
                'name'           => 'Teacher 4',
                'email'          => 'teacher4@teacher4.com',
                'img_url'        => 'assets/img/users/5.jpg',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'class_id'       => null,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 6,
                'name'           => 'Teacher 5',
                'email'          => 'teacher5@teacher5.com',
                'img_url'        => 'assets/img/users/user.png',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'class_id'       => null,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 7,
                'name'           => 'Student',
                'email'          => 'student@student.com',
                'img_url'        => 'assets/img/users/user.png',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'class_id'       => 1,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
        ];

        User::insert($users);
    }
}
