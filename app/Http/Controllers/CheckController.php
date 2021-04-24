<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Test;

class CheckController extends Controller
{

    public function check()
    {
        return response()->json("OK");
    }

    public function check2()
    {
        $cars = array("Honda", "Toyota", "Ford");
        return response()->json($cars);
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
