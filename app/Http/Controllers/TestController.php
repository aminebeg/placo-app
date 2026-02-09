<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function orderTest()
    {
        return view('test-order');
    }
}
