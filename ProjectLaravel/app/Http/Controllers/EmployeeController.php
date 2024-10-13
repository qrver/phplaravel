<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Загуглил, как делать логирование)

use Illuminate\Support\Facades\Log;

use App\Models\Employee;

class EmployeeController extends Controller
{
    // Отображение формы
    public function index()
    {
        return view('employee-form');
    }

    // Обработка данных формы
    public function store(Request $request)
    {
        // Получаем данные из формы
        $name = $request->input('name');
        $surname = $request->input('surname');
        $position = $request->input('position');
        $address = $request->input('address');
        $email = $request->input('email');
        $workData = $request->input('workData');

        // Получаем JSON данные и декодируем их
        $jsonData = $request->input('jsonData');
        $jsonArray = json_decode($jsonData, true);

        // Проверяем, что JSON корректен
        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->withErrors(['jsonData' => 'Некорректный JSON']);
        }

        // Извлекаем данные из JSON
        $street = $jsonArray['address']['street'] ?? null;
        $city = $jsonArray['address']['city'] ?? null;
        $lat = $jsonArray['address']['geo']['lat'] ?? null;
        $lng = $jsonArray['address']['geo']['lng'] ?? null;

        // Попробуем использовать логирование

        Log::debug("Пользователь $name $surname на должности $position живет по адресу $address с рабочей почтой $email. Данные о работе: $workData. JSON данные: $street, $city, $lat, $lng");

        Employee::create([
            'first_name' => $name,
            'last_name' => $surname,
            'email' => $email,
            'position' => $position,
            'address' => $address,
            'work_data' => $workData,
            'street' => $street,
            'city' => $city,
            'latitude' => $lat,
            'longitude' => $lng,
        ]);

        return view('employee-result', compact(
            'name',
            'surname',
            'position',
            'address',
            'email',
            'workData',
            'street',
            'city',
            'lat',
            'lng'
        ));
    }

    // Метод для обновления данных сотрудника по ID
    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $position = $request->input('position');
        $address = $request->input('address');
        $workData = $request->input('workData');

        $jsonData = $request->input('jsonData');
        $jsonArray = json_decode($jsonData, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'Некорректный JSON'], 400);
        }

        $street = $jsonArray['address']['street'] ?? null;
        $city = $jsonArray['address']['city'] ?? null;
        $latitude = $jsonArray['address']['geo']['lat'] ?? null;
        $longitude = $jsonArray['address']['geo']['lng'] ?? null;

        // Находим сотрудника по ID
        $employee = Employee::find($id);

        // Проверяем, существует ли сотрудник
        if (!$employee) {
            return response()->json(['error' => 'Сотрудник не найден'], 404);
        }

        // Обновляем данные сотрудника
        $employee->update([
            'first_name' => $name,
            'last_name' => $surname,
            'email' => $email,
            'position' => $position,
            'address' => $address,
            'work_data' => $workData,
            'street' => $street,
            'city' => $city,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);

        // Возвращаем обновленные данные сотрудника
        return response()->json([
            'message' => "Данные сотрудника с ID {$id} обновлены",
            'employee' => $employee,
        ]);
    }


    public function getPath(Request $request)
    {
        $path = $request->path();
    }

    public function getUrl(Request $request)
    {
        $url = $request->url();
    }
}
