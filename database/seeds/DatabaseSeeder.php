<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(
            [
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            LectureClassesTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            LessonsTableSeeder::class,
            DepartmentTableSeeder::class,
            RankTableSeeder::class,
            LectureHallTableSeeder::class,
            LectureHallResourceTableSeeder::class,
            LectureTypeTableSeeder::class,
            PositionTableSeeder::class,
            ]
        );
    }
}
