<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubmissionFullResource;
use App\Http\Resources\SubmissionResource;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $submissions = Submission::all();
        return response()->json($submissions);
    }

    public function show($sid)
    {
        $submission = new SubmissionResource(Submission::find($sid));
        return response()->json($submission);
    }

    public function showContent($sid)
    {
        $submission = new SubmissionFullResource(Submission::find($sid));
        return response()->json($submission);
    }

    public function create(Request $request)
    {
        $submission = new Submission();
        $submission->student_id = $request->student_id;
        $submission->test_id = $request->test_id;
        $submission->attempt_number = $request->attempt_number;
        $submission->submission_status = 'Started';
        $submission->start_date = date('Y-m-d H:i:s');
        $submission->save();
        return response()->json($submission);
    }

    public function submit(Request $request, $sid)
    {
        $submission = Submission::find($sid);
//        $submission->name = $request->input('name');
//        $submission->price = $request->input('price');
//        $submission->description = $request->input('description');
        $submission->submission_status = 'Submitted';
        $submission->submission_date = date('Y-m-d H:i:s');

        $submission->grading_status = 'Graded';
        $submission->graded_date = date('Y-m-d H:i:s');
        $submission->graded_by = 'System';
        $submission->grade_value = 91;
        $submission->grade_max_value = 100;

        $submission->save();
        return response()->json($submission);
    }

    public function delete($sid)
    {
        $submission = Submission::find($sid);
        $submission->delete();
        return response()->json('Deleted successfully');
    }

}
