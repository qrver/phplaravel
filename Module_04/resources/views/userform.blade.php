<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма</title>
</head>
<body>
    <h1>Заполните форму</h1>
    <form action="/store_form" method="POST">
        @csrf
        <label for="first_name">Имя:</label>
        <input type="text" name="first_name" id="first_name"><br><br>

        <label for="last_name">Фамилия:</label>
        <input type="text" name="last_name" id="last_name"><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email"><br><br>

        <button type="submit">Отправить</button>
    </form>
</body>
</html>