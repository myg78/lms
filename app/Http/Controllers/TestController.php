<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestResource;
use App\Models\Test;

class TestController extends Controller
{

    public function test()
    {
        return response()->json("OK");
    }

    public function test2()
    {
        $cars = array("Honda", "Toyota", "Ford");
        return response()->json($cars);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
//        $tests = Test::all();
        $tests = TestResource::collection(Test::all());
        return response()->json($tests);
    }

//    public function showAllAuthors()
//    {
//        return response()->json(Author::all());
//    }
//
//    public function showOneAuthor($id)
//    {
//        return response()->json(Author::find($id));
//    }
//
//    public function create(Request $request)
//    {
//        $author = Author::create($request->all());
//
//        return response()->json($author, 201);
//    }
//
//    public function update($id, Request $request)
//    {
//        $author = Author::findOrFail($id);
//        $author->update($request->all());
//
//        return response()->json($author, 200);
//    }
//
//    public function delete($id)
//    {
//        Author::findOrFail($id)->delete();
//        return response('Deleted Successfully', 200);
//    }
}
