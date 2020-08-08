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
                'img_url'        => 'assets/img/users/2.jpg',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'class_id'       => null,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 2,
                'name'           => 'lecturer2',
                'email'          => 'lecturer2@lecturer2.com',
                'img_url'        => 'assets/img/users/user.png',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'class_id'       => null,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 3,
                'name'           => 'lecturer2 2',
                'email'          => 'lecturer22@lecturer22.com',
                'img_url'        => 'assets/img/users/user.png',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'class_id'       => null,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 4,
                'name'           => 'lecturer2 3',
                'email'          => 'lecturer23@lecturer23.com',
                'img_url'        => 'assets/img/users/user.png',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'class_id'       => null,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 5,
                'name'           => 'lecturer2 4',
                'email'          => 'lecturer24@lecturer24.com',
                'img_url'        => 'assets/img/users/user.png',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'class_id'       => null,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 6,
                'name'           => 'lecturer2 5',
                'email'          => 'lecturer25@lecturer25.com',
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
