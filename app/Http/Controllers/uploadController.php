<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class uploadController extends Controller
{
    function index(Request $request)
    {
        $filename = time() . "." . $request->file('img')->getClientOriginalExtension();
        $upload = $request->file('img')->storeAs('public/uploads', $filename);
        echo $upload;
    }
}
