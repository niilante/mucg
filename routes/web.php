<?php

Route::get('/', function () {
        return redirect(route('login'));
    })->name('admin');

Route::get(
    '/home',
    function () {
        $routeName = auth()->user() && (auth()->user()->is_student || auth()->
                        user()->is_lecturer) ? 'admin.calendar.index' : 'admin.home';
        if (session('status')) {
            return redirect()->route($routeName)->with('status', session('status'));
        }

        return redirect()->route($routeName);
    }
);

Auth::routes(['register' => false]);
// Admin

Route::group(
    ['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']],
    function () {
        Route::get('/', 'HomeController@index')->name('home');
        // Permissions
        Route::delete('permissions/destroy', 'PermissionsController@massDestroy')
                ->name('permissions.massDestroy');
        Route::resource('permissions', 'PermissionsController');

        // Roles
        Route::delete('roles/destroy', 'RolesController@massDestroy')
                ->name('roles.massDestroy');
        Route::resource('roles', 'RolesController');

        // Users
        Route::delete('users/destroy', 'UsersController@massDestroy')
                ->name('users.massDestroy');
        Route::resource('users', 'UsersController');

        // Lessons
        Route::delete('lessons/destroy', 'LessonsController@massDestroy')
                ->name('lessons.massDestroy');
        Route::resource('lessons', 'LessonsController');

        // Departments
        Route::delete('departments/destroy', 'DepartmentController@massDestroy')
                ->name('departments.massDestroy');
        Route::resource('departments', 'DepartmentController');

        // Ranks
        Route::delete('ranks/destroy', 'RankController@massDestroy')
                ->name('ranks.massDestroy');
        Route::resource('ranks', 'RankController');

        // Lecture Classes (Group of People)
        Route::delete('lecture-classes/destroy', 'LectureClassesController@massDestroy')
                ->name('lecture-classes.massDestroy');
        Route::resource('lecture-classes', 'LectureClassesController');

        // Lecture Classes
        Route::get('calendar', 'CalendarController@index')
                ->name('calendar.index');
    }
);
