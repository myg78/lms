<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubmissionResource;
use App\Models\Student;
use App\Models\Submission;


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
    public function show($uid)
    {
        $student = Student::find($uid);
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

    public function getTests($uid)
    {
        $tests = SubmissionResource::collection(Student::find($uid)->tests);
        return response()->json($tests);
    }

    public function getTest($uid, $tid)
    {
        $test = Submission::where('student_id', $uid)
            ->where('test_id', $tid)
            ->first();
//        $response = new SubmissionResource($test);
        return response()->json($test);
//        $response = new SubmissionResource(Submission::findOrFail(3));
//        return response()->json($response);
    }

}
