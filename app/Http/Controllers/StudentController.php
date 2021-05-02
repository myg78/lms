<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubmissionResource;
use App\Models\Student;


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

//    public function create(Request $request)
//    {
//        $product = new Product;
//
//        $product->name = $request->name;
//        $product->price = $request->price;
//        $product->description = $request->description;
//
//        $product->save();
//
//        return response()->json($product);
//    }
//
    public function show($id)
    {
        $student = Student::find($id);
        return response()->json($student);
    }
//
//    public function update(Request $request, $id)
//    {
//        $product = Product::find($id);
//
//        $product->name = $request->input('name');
//        $product->price = $request->input('price');
//        $product->description = $request->input('description');
//        $product->save();
//        return response()->json($product);
//    }
//
//    public function destroy($id)
//    {
//        $product = Product::find($id);
//        $product->delete();
//
//        return response()->json('product removed successfully');
//    }

    public function getTests($id)
    {
//        $tests = Student::find($id)->tests;
//        $tests = StudentTestResource::collection(StudentTest::all());
        $tests = SubmissionResource::collection(Student::find($id)->tests);
        return response()->json($tests);
    }

}
