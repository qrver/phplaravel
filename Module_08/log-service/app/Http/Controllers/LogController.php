<?php

namespace App\Http\Controllers;

use App\Models\Log;

class LogController extends Controller
{
    public function index()
    {
        // Получаем все логи из базы данных, сортируя по времени в обратном порядке
        $logs = Log::orderBy('time', 'desc')->get();

        return view('logs', compact('logs'));
    }
}
