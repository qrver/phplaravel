<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Валидация
        $request->validate([
            'name' => 'required|max:50',
            'surname' => 'required|max:50',
            'email' => ['required', 'email', 'regex:/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/'],
        ]);

        // Создание
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
        ]);

        // Возвращение пользователя в JSON
        return response()->json($user, 201);
    }

    public function index()
    {
        // Получение пользователей
        $users = User::all();

        // Возвращение в JSON
        return response()->json($users);
    }

    public function get($id)
    {
        // Поиск по ID
        $user = User::find($id);

        // Проверка
        if ($user) {
            return response()->json($user);
        } else {
            // Не найден, -> 404
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }
    }
}
