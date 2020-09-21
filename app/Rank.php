<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $fillable = [
        'name',
        'description',
        'code',
        'credit_hours',
        'added_by_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getRouteKeyName()
    {
        return 'code';
    }

    // public function departmentLessons()
    // {
    //     return $this->hasMany(Lesson::class, 'department_id', 'id');
    // }

    public function addedBy()
    {
        return $this->belongsTo("App\User", "added_by_id");
    }
}
