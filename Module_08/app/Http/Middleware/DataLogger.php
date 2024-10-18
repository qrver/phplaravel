<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Log;

class DataLogger
{
    private $startTime;

    // Обработка входящего запроса
    public function handle($request, Closure $next)
    {
        // Засекаем время начала запроса
        $this->startTime = microtime(true);

        // Передаём запрос дальше по цепочке
        return $next($request);
    }

    // Обработка после отправки ответа пользователю.
    public function terminate($request, $response)
    {
        if (env('API_DATALOGGER', true)) {
            $endTime = microtime(true);
            $duration = round(($endTime - LARAVEL_START) * 1000, 2); // Длительность в мс

            $data = [
                'time' => now(),
                'duration' => $duration,
                'ip' => $request->ip(),
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'input' => json_encode($request->all()),
            ];

            if (env('API_DATALOGGER_USE_DB', true)) {
                // Сохраняем в базу данных
                Log::create($data);
            } else {
                // Сохраняем в файл
                $logString = implode(' | ', $data) . PHP_EOL;
                $filename = 'api_datalogger_' . date('d-m-y') . '.log';
                $logPath = storage_path('logs' . DIRECTORY_SEPARATOR . $filename);

                file_put_contents($logPath, $logString, FILE_APPEND);
            }
        }
    }
}
