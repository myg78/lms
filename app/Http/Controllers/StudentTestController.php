<?php

namespace App\Http\Controllers;

use App\Models\StudentTest;
use App\Models\Test;

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

}
