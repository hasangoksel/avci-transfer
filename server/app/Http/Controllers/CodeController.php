<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function generate()
    {
        $code = mt_rand(100000, 999999);
        return response()->json(['code' => $code]);
    }
}
