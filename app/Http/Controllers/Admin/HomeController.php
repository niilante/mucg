<?php

namespace App\Http\Controllers\Admin;

use App\Lesson;
use App\LectureClass;
use App\User;

class HomeController
{
    public function index()
    {

        // $data['lecture_class_counts'] = LectureClass::all()->dd();

        $data['lesson_counts'] = Lesson::all()->count();
        $data['lecture_class_counts'] = LectureClass::all()->count();
        $data['user_counts'] = User::all()->count();

        return view('home', $data);
    }
}
