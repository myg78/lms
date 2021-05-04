<?php

namespace App\Http\Controllers;

class CheckController extends Controller
{

    public function check()
    {
        return response()->json("OK");
    }

}
