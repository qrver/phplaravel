<?php

namespace App\Http\Controllers;

use App\Models\Log;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::orderBy('time', 'desc')->get();

        return view('logs', compact('logs'));
    }
}
