<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentTest extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'studentId', 'testId', 'attemptNumber', 'submissionStatus', 'submissionDate',
        'gradingStatus', 'gradedDate', 'gradedBy', 'gradeValue', 'gradeMaxValue'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
