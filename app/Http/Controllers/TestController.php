<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestBasicResource;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $tests = TestBasicResource::collection(Test::all());
        return response()->json($tests);
    }

    public function show($id)
    {
        $test = new TestBasicResource(Test::find($id));
        return response()->json($test);

    }

    public function create(Request $request)
    {
        $format = 'Y-m-d H:i:s';
        $test = new Test();
        $test->title = $request->title;
        $test->description = $request->description;
        $test->type = $request->type;
        $test->time_limit_in_seconds = $request->time_limit_in_seconds;
        $test->start_date = date($format, strtotime($request->start_date));
        $test->due_date = date($format, strtotime($request->due_date));
        $test->content = json_decode($request->test_content);
        $test->save();
        return response()->json($test);
    }

}
