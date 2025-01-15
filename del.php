<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Удаление записей из БД</title>
    <link href="/style.css" rel="stylesheet" />
</head>
<body>
<div class=border>
<?php

$serverName = "mysql2";
$userName = "web_db";
$password = "Msk2025!";
$dbName = "my_db";

        // создание соединения
        $conn = mysqli_connect($serverName, $userName, $password, $dbName);

        // проверка соединения
        if (!$conn) {
            die("Соединение не удалось: " . mysqli_connect_error());
        }

        // SQL-запрос для добавления данных
        $sql = "TRUNCATE TABLE myTable";
        if (mysqli_query($conn, $sql)) {
            echo "Данные удалены";
        } else {
            echo "Не удалось удалить данные. Ошибка: " . mysqli_error($conn);
        }
        // закрытие соединения
        mysqli_close($conn);

?>
          <br>
          <p> <a href="/index.php">Вернуться назад</a> </p>
    </div>
    </body>
</html>
