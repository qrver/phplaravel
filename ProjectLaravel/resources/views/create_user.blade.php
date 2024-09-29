@extends('layouts.default')

@section('content')

    <h1>Создать нового пользователя</h1>
    
    <form action="/store-user" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" required maxlength="50">
        </div>

        <div class="form-group">
            <label for="surname">Фамилия:</label>
            <input type="text" id="surname" name="surname" required maxlength="50">
        </div>

        <div class="form-group">
            <label for="email">Электронная почта:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <button type="submit">Создать</button>
    </form>

@endsection