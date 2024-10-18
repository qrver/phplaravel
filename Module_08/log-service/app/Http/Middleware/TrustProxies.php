<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * Надёжные прокси для этого приложения.
     *
     * @var array<int, string>|string|null
     */
    protected $proxies;

    /**
     * Заголовки, используемые для обнаружения прокси.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
