@extends('layouts.default')

@section('content')

<h2>Добавить сотрудника</h2>
<form name="employee-form" id="employee-form" method="post" action="{{ url('store-form') }}">
    @csrf
    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" id="name" name="name" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="surname">Фамилия</label>
        <input type="text" id="surname" name="surname" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="position">Должность</label>
        <input type="text" id="position" name="position" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="address">Адрес проживания</label>
        <input type="text" id="address" name="address" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="email">Электронная почта</label>
        <input type="email" id="email" name="email" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="workData">Данные о работе</label>
        <textarea name="workData" id="workData" class="form-control" required="true"></textarea>
    </div>
    <div class="form-group">
        <label for="jsonData">JSON данные</label>
        <textarea name="jsonData" id="jsonData" class="form-control" required="true" rows="5">{
            "address": {
                "street": "Ленина",
                "suite": "дом 34",
                "city": "Москва",
                "zipcode": "102302",
                "geo": {
                    "lat": "-370.3159",
                    "lng": "810.1496"
                }
            }
        }
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>

@endsection
