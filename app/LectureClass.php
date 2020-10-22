<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\PluckableTrait;

class LectureClass extends Model
{
    use SoftDeletes, PluckableTrait;

    public $table = 'lecture_classes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'capacity',
        'department_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function classLessons()
    {
        return $this->hasMany(Lesson::class, 'class_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function classUsers()
    {
        return $this->hasMany(User::class, 'class_id', 'id');
    }
}
