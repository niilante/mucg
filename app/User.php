<?php

namespace App;

use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    public $table = 'users';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'email_verified_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'class_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'remember_token',
        'email_verified_at',
    ];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function getIsLecturerAttribute()
    {
        return $this->roles()->where('id', 3)->exists();
    }

    public function getIsStudentAttribute()
    {
        return $this->roles()->where('id', 4)->exists();
    }

    public function getIsAdmin()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function getIsLecturer()
    {
        return $this->roles()->where('id', 3)->exists();
    }

    public function getIsStudent()
    {
        return $this->roles()->where('id', 4)->exists();
    }

    public function getRoleNameAttribute()
    {
        if ($this->getIsAdminAttribute() == true) {
            return 'Admin';
        } elseif ($this->getIsStudentAttribute() == true) {
            return 'Student';
        } else {
            return 'Lecturer';
        }

        return 'User';
    }

    public function getRoleCodeAttribute()
    {
        if ($this->getIsAdminAttribute() == true) {
            return 'admin';
        } elseif ($this->getIsStudentAttribute() == true) {
            return 'student';
        } else {
            return 'lecturer';
        }

        return 'user';
    }

    public function gender()
    {
        return $this->belongsTo("App\Gender", "gender_id");
    }

    public function lecturerLessons()
    {
        return $this->hasMany(Lesson::class, 'lecturer_id', 'id');
    }

    public function lecturerTimeTables()
    {
        return $this->hasMany(Lesson::class, 'lecturer_id', 'id');
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function class()
    {
        return $this->belongsTo(LectureClass::class, 'class_id');
    }

    public function classes()
    {
        return $this->belongsToMany(LectureClass::class, 'class_id');
    }
}
