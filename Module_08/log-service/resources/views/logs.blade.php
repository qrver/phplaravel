<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Логи HTTP-запросов</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 14px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {background-color: #f9f9f9;}
        tr:hover {background-color: #f5f5f5;}
    </style>
</head>
<body>
    <h1>Логи HTTP-запросов</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Время</th>
                <th>Длительность (мс)</th>
                <th>IP</th>
                <th>URL</th>
                <th>Метод</th>
                <th>Параметры</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->time }}</td>
                    <td>{{ $log->duration }}</td>
                    <td>{{ $log->ip }}</td>
                    <td>{{ $log->url }}</td>
                    <td>{{ $log->method }}</td>
                    <td>{{ $log->input }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
