<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Резюме пользователя</title>
    <!-- Русский язык не выводился корректно, поэтому я переопределил стили-->
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin-left: 50px;
        }
        .field {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Резюме пользователя</h1>
    </div>
    <div class="content">
        <div class="field">
            <strong>Имя:</strong> {{ $name }}
        </div>
        <div class="field">
            <strong>Фамилия:</strong> {{ $surname }}
        </div>
        <div class="field">
            <strong>Email:</strong> {{ $email }}
        </div>
    </div>
</body>
</html>
