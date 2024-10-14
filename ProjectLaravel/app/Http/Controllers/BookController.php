<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        return view('book-form');
    }

    public function store(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'title' => 'required|max:255|unique:books',
            'author' => 'required|max:100',
            'genre' => 'required',
        ]);

        // Создание новой записи в базе данных
        Book::create($validatedData);

        // Сначала написал на русском -> получил символы в Unicode :(
        return response()->json('Book was added in DB');
    }
}
