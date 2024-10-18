<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * Список URI, которые должны быть доступны в режиме обслуживания.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Добавьте URI, которые должны быть доступны
    ];
}
