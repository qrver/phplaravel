@extends('layouts.default')

@section('title', 'Главная страница')

@section('content')
    <h2>Добро пожаловать на главную страницу!</h2>
    <p>Имя: {{ $name }}</p>
    <p>Возраст: 
        @if($age > 18)
            {{ $age }}
        @else
            Указанный человек слишком молод.
        @endif
    </p>
    <p>Должность: {{ $position }}</p>
    <p>Адрес: {{ $address }}</p>
@endsection
