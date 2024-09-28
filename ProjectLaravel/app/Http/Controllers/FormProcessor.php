<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormProcessor extends Controller
{
    public function index()
    {
        return view('userform');
    }

    public function store(Request $request)
    {
        $data = $request->only(['first_name', 'last_name', 'email']);
        return view('hello', $data);
    }
}
