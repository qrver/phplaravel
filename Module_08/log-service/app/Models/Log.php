<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';

    // Отключаем автоматические метки времени
    public $timestamps = false;

    // Разрешаем массовое заполнение полей
    protected $fillable = [
        'time',
        'duration',
        'ip',
        'url',
        'method',
        'input',
    ];
}
