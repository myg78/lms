<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubmissionResource;
use App\Models\Student;
use App\Models\Submission;


class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function show($uid)
    {
        $student = Student::find($uid);
        return response()->json($student);
    }

    public function getTests($uid)
    {
        $tests = SubmissionResource::collection(Student::find($uid)->tests);
        return response()->json($tests);
    }

    public function getTest($uid, $tid)
    {
        $test = Submission::where('student_id', $uid)
            ->where('test_id', $tid)
            ->first();
        return response()->json($test);
    }

}
