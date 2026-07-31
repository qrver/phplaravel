# ProjectLaravel

Приложение на Laravel 11 для учёта сотрудников, ведения каталога книг, управления
пользователями и генерации PDF-резюме. Построено на стандартной MVC-архитектуре
Laravel с использованием Eloquent ORM, Blade и Bootstrap 4.

## Возможности

**Сотрудники** — форма с полями имя, фамилия, должность, адрес, email, рабочие
данные и JSON с гео-координатами. При отправке JSON парсится, поля извлекаются и
сохраняются в отдельные колонки БД. Пишется отладочный лог. Поддерживается
обновление записи через `PUT /user/{id}` с ответом в JSON.

**Книги** — форма с валидацией: название уникально среди всех книг, автор не
длиннее 100 символов, жанр выбирается из выпадающего списка. При ошибке
валидации сообщения возвращаются в форму.

**Пользователи** — создание через HTML-форму, получение списка всех пользователей
(JSON), получение одного по ID (JSON или 404). Пароль из модели удалён — это
упрощённая модель для демонстрации CRUD, без аутентификации.

**PDF-резюме** — по ID пользователя генерируется PDF через `barryvdh/laravel-dompdf`.
Шаблон написан на Blade, для корректного отображения кириллицы задан шрифт DejaVu Sans.
Документ отдаётся как поток.

## Стек

PHP 8.2, Laravel 11, SQLite, Blade, Bootstrap 4 (CDN), barryvdh/laravel-dompdf,
Vite (для сборки фронтенда).

## Маршруты

```mermaid
flowchart TD
    subgraph "HTML-страницы"
        A[GET /] --> B[home.blade.php]
        C[GET /contacts] --> D[contacts.blade.php]
        E[GET /userform] --> F[userform.blade.php]
        F -->|POST /store_form| G[hello.blade.php]
        H[GET /get-employee-data] --> I[employee-form.blade.php]
        I -->|POST /store-form| J[employee-result.blade.php]
        K[GET /books/index] --> L[book-form.blade.php]
        M[GET /create-user] --> N[create_user.blade.php]
    end

    subgraph "JSON API"
        L -->|POST /books/store| O["{message: 'Book was added in DB'}"]
        N -->|POST /store-user| P["User JSON (201)"]
        Q[GET /user] --> R["[User, User, ...]"]
        S[GET /user/{id}] --> T["User | 404"]
        I -->|PUT /user/{id}| U["{message, employee}"]
    end

    subgraph "PDF"
        V[GET /resume/{id}] --> W[resume.pdf]
    end
```

## База данных

По умолчанию SQLite. Схема управляется миграциями в `database/migrations`:

| Таблица | Поля |
| --- | --- |
| `users` | `name`, `surname`, `email` (уникальный), `timestamps` |
| `employees` | `first_name`, `last_name`, `email` (уникальный), `position`, `address`, `work_data`, `street`, `city`, `latitude` (decimal), `longitude` (decimal), `timestamps` |
| `books` | `title`, `author`, `genre`, `timestamps` |

Миграции демонстрируют как создание таблиц с нуля, так и инкрементальное
изменение схемы: таблица `employees` создаётся в одной миграции, а JSON-поля
добавляются в следующей.

## Переменные окружения

`.env` исключён из Git. Пример — в `.env.example`.

| Переменная | Назначение | По умолчанию |
| --- | --- | --- |
| `APP_NAME` | название | `Laravel` |
| `APP_ENV` | окружение | `local` |
| `APP_KEY` | ключ шифрования | — |
| `DB_CONNECTION` | тип БД | `sqlite` |
| `DB_DATABASE` | путь к файлу SQLite | `database/database.sqlite` |

## Запуск

```bash
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## Тесты

```bash
php artisan test
```

## Структура

```bash
app/Http/Controllers/EmployeeController.php # CRUD сотрудников + логирование
app/Http/Controllers/BookController.php # каталог книг с валидацией
app/Http/Controllers/UserController.php # CRUD пользователей (JSON API)
app/Http/Controllers/FormProcessor.php # обработка простой формы
app/Http/Controllers/PdfGeneratorController.php # генерация PDF-резюме
app/Models/Employee.php # модель Employee (10 fillable-полей)
app/Models/Book.php # модель Book (3 fillable-поля)
app/Models/User.php # модель User (3 fillable-поля, без auth)
routes/web.php # 11 маршрутов
resources/views/layouts/default.blade.php # общий layout
resources/views/includes # header, footer, head (Bootstrap 4)
resources/views # страницы и формы
database/migrations # 7 миграций
database/seeders # DatabaseSeeder (создаёт тестового пользователя)
```
