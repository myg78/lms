<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubmissionResource;
use App\Models\Submission;

class SubmissionController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $tests = Submission::all();
        return response()->json($tests);
    }

    public function show($id)
    {
        $test = new SubmissionResource(Submission::find($id));
        return response()->json($test);
    }

}
