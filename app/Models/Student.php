<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'studentNumber', 'firstName', 'lastName'
    ];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    public function comments() {
//        return $this->hasMany(StudentTest::class);
//        return $this->hasMany(StudentTest::class, 'student_id');
        return $this;
    }

}
