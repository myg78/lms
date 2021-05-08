<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubmissionFullResource;
use App\Http\Resources\SubmissionResource;
use App\Models\Submission;
use App\Models\Test;
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
        $submission->submission_status = 'Submitted';
        $submission->submission_date = date('Y-m-d H:i:s');
        $submission->content = $request->form_value;
        $submission->grading_status = 'Graded';
        $submission->graded_date = date('Y-m-d H:i:s');
        $submission->graded_by = 'System';
        $grade = $this->getGrade($submission->test_id, $request->form_value);
        $submission->grade_value = $grade;
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

    public function getGrade($test_id, $form_value) {

        // get answer key
        $test = Test::find($test_id);
        $questions = json_decode($test->content);
        $answer_key = array();
        foreach($questions as $item) {
            $answer_key[$item->number] = $item->answer;
        }

        // get selected answers
        $form_answers = json_decode($form_value)->questions;
        $submitted_key = array();
        foreach($form_answers as $item) {
            $selected = is_null($item->selectedValue) ? "" : $item->selectedValue->id;
            $submitted_key[$item->number] = $selected;
        }

        // check answers
        $correct = 0;
        $incorrect = 0;
        foreach($submitted_key as $number => $selected) {
            $correct_answer = $answer_key[$number];
            $is_correct = $selected == $correct_answer;
            if ($is_correct) {
                $correct++;
            } else {
                $incorrect++;
            }
        }

        return $correct / count($answer_key) * 100;
    }

}
