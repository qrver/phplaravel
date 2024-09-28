@extends('layouts.default')

@section('content')

<h1>Данные добавлены в базу данных</h1>
<p>Подробнее о добавленных данных ниже:</p>
<h2>Данные сотрудника</h2>
<p><strong>Имя:</strong> {{ $name }}</p>
<p><strong>Фамилия:</strong> {{ $surname }}</p>
<p><strong>Должность:</strong> {{ $position }}</p>
<p><strong>Адрес проживания:</strong> {{ $address }}</p>
<p><strong>Email:</strong> {{ $email }}</p>
<p><strong>Данные о работе:</strong> {{ $workData }}</p>
<h3>Адрес из JSON:</h3>
<p><strong>Улица:</strong> {{ $street }}</p>
<p><strong>Город:</strong> {{ $city }}</p>
<p><strong>Широта:</strong> {{ $lat }}</p>
<p><strong>Долгота:</strong> {{ $lng }}</p>

@endsection