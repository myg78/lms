<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentTestResource;
use App\Models\StudentTest;

class StudentTestController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $tests = StudentTest::all();
        return response()->json($tests);
    }

    public function show($id)
    {
        $test = new StudentTestResource(StudentTest::find($id));
        return response()->json($test);
    }

}
