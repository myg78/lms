<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestBasicResource;
use App\Models\Test;

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

}
