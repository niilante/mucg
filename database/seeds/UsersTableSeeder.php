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
                'uname'          => '',
                'fname'          => 'Admin',
                'mname'          => '',
                'lname'          => 'user',
                'gender_id'      => 1,
                'dob'            => '',
                'phone'          => '',
                'added_by_id'    => 1,
                'bio'            => '',
                'email'          => 'admin@admin.com',
                'img_url'        => 'assets/img/users/2.jpg',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'department_id'  => 1,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 2,
                'uname'          => '',
                'fname'          => 'lecturer2',
                'mname'          => '',
                'lname'          => 'user',
                'gender_id'      => 1,
                'dob'            => '',
                'phone'          => '',
                'added_by_id'    => 1,
                'bio'            => '',
                'email'          => 'lecturer2@lecturer2.com',
                'img_url'        => 'assets/img/users/user.png',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'department_id'  => 1,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 3,
                'uname'          => '',
                'fname'          => 'lecturer2 2',
                'mname'          => '',
                'lname'          => 'user',
                'gender_id'      => 1,
                'dob'            => '',
                'phone'          => '',
                'added_by_id'    => 1,
                'bio'            => '',
                'email'          => 'lecturer22@lecturer22.com',
                'img_url'        => 'assets/img/users/user.png',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'department_id'  => 1,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 4,
                'uname'          => '',
                'fname'          => 'lecturer2 3',
                'mname'          => '',
                'lname'          => 'user',
                'gender_id'      => 1,
                'dob'            => '',
                'phone'          => '',
                'added_by_id'    => 1,
                'bio'            => '',
                'email'          => 'lecturer23@lecturer23.com',
                'img_url'        => 'assets/img/users/user.png',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'department_id'  => 1,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 5,
                'uname'          => '',
                'fname'          => 'lecturer2 4',
                'mname'          => '',
                'lname'          => 'user',
                'gender_id'      => 1,
                'dob'            => '',
                'phone'          => '',
                'added_by_id'    => 1,
                'bio'            => '',
                'email'          => 'lecturer24@lecturer24.com',
                'img_url'        => 'assets/img/users/user.png',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'department_id'  => 1,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 6,
                'uname'          => '',
                'fname'          => 'lecturer2 5',
                'mname'          => '',
                'lname'          => 'user',
                'gender_id'      => 1,
                'dob'            => '',
                'phone'          => '',
                'added_by_id'    => 1,
                'bio'            => '',
                'email'          => 'lecturer25@lecturer25.com',
                'img_url'        => 'assets/img/users/user.png',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'department_id'  => 1,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 7,
                'uname'          => '',
                'fname'          => 'Student',
                'mname'          => '',
                'lname'          => 'user',
                'gender_id'      => 1,
                'dob'            => '',
                'phone'          => '',
                'added_by_id'    => 1,
                'bio'            => '',
                'email'          => 'student@student.com',
                'img_url'        => 'assets/img/users/user.png',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'department_id'  => 1,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
        ];

        User::insert($users);
    }
}
