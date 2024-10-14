<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormProcessor;

use App\Models\Employee;

use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('home', [
        'name' => 'Danila Gordienko',
        'age' => 20,
        'position' => 'Product Manager',
        'address' => 'г. Краснодар, улица Секретная, дом Еще Секретнее xD',
    ]);
});

Route::get('/userform', [FormProcessor::class, 'index']);

Route::post('/store_form', [FormProcessor::class, 'store']);

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

Route::get('/contacts', function () {
    return view('contacts', [
        'address' => 'г. Официальный, улица Серьезная, дом Душный',
        'post_code' => '999000',
        'email' => 'info@example.com',
        'phone' => '+1 (001) 010-01-10',
    ]);
});

Route::get('get-employee-data', [EmployeeController::class, 'index']);
Route::post('store-form', [EmployeeController::class, 'store']);
Route::put('/user/{id}', [EmployeeController::class, 'update']);

use App\Http\Controllers\BookController;

// Я поменял роуты для удобства, потому что слишком много index и store у нас :)

Route::get('/books/index', [BookController::class, 'index'])->name('index');
Route::post('/books/store', [BookController::class, 'store'])->name('store');
