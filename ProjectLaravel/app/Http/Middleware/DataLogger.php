<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Log;

class DataLogger
{
    private $startTime;

    public function handle($request, Closure $next)
    {
        $this->startTime = microtime(true);
        return $next($request);
    }

    public function terminate($request, $response)
    {
        if (env('API_DATALOGGER', true)) {
            $endTime = microtime(true);
            $laravelStart = defined('LARAVEL_START') ? LARAVEL_START : $this->startTime;
            $duration = round(($endTime - $laravelStart) * 1000, 2);

            $data = [
                'time' => now(),
                'duration' => $duration,
                'ip' => $request->ip(),
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'input' => json_encode($request->all()),
            ];

            if (env('API_DATALOGGER_USE_DB', true)) {
                Log::create($data);
            } else {
                $logString = implode(' | ', $data) . PHP_EOL;
                $filename = 'api_datalogger_' . date('d-m-y') . '.log';
                $logPath = storage_path('logs' . DIRECTORY_SEPARATOR . $filename);
                file_put_contents($logPath, $logString, FILE_APPEND);
            }
        }
    }
}
