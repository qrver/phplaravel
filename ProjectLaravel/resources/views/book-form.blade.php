@extends('layouts.default')

@section('content')

<div class="add-books__form-wrapper">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form name="add-new-book" id="add-new-book" method="post" action="{{url('books/store')}}">
        @csrf
        <div class="form-section">
            <label for="title">Название</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-section">
            <label for="author">Автор</label>
            <input type="text" id="author" name="author" class="form-control" required>
        </div>
        <div class="form-section">
            <label for="genre">Выберите Жанр:</label>
            <select name="genre" id="genre" required>
                <option value="fantasy">Fantasy</option>
                <option value="sci-fi">Sci-Fi</option>
                <option value="mystery">Mystery</option>
                <option value="drama">Drama</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>

@endsection