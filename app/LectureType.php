<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LectureType extends Model
{
    protected $fillable = [
        'name',
        'description',
        'code',
        'added_by_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getRouteKeyName()
    {
        return 'code';
    }

    public function addedBy()
    {
        return $this->belongsTo("App\User", "added_by_id");
    }
}
