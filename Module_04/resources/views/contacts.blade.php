@extends('layouts.default')

@section('title', 'Контакты')

@section('content')
    <h2>Контакты</h2>
    <p>Адрес: {{ $address }}</p>
    <p>Почтовый индекс: {{ $post_code }}</p>
    <p>Телефон: {{ $phone }}</p>
    <p>Email: 
        @if(empty($email))
            Адрес электронной почты не указан.
        @else
            {{ $email }}
        @endif
    </p>
@endsection
