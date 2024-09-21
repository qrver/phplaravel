<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\FormProcessor;

Route::get('/userform', [FormProcessor::class, 'index']);

Route::post('/store_form', [FormProcessor::class, 'store']);

use App\Models\Employee;

Route::get('/test_database', function () {

    $existingEmployee = Employee::where('email', 'ivan@example.com');

    if ($existingEmployee) {
        return 'Сотрудник с таким email уже существует!';
    }

    $employee = new Employee;
    $employee->first_name = 'Иван';
    $employee->last_name = 'Иванов';
    $employee->email = 'ivan@example.com';
    $employee->save();

    return 'Новый сотрудник сохранен!';
});
