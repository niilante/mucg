<?php

namespace App\Http\Controllers\Admin;

use App\Lesson;
use App\SchoolClass;
use App\User;

class HomeController
{
    public function index()
    {

        // $data['school_class_counts'] = SchoolClass::all()->dd();

        $data['lesson_counts'] = Lesson::all()->count();
        $data['school_class_counts'] = SchoolClass::all()->count();
        $data['user_counts'] = User::all()->count();

        return view('home', $data);
    }
}
