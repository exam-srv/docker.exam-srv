<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Вывод данных из БД</title>
    <link href="/style.css" rel="stylesheet" />
    <style>
        td:nth-child(5),td:nth-child(6){text-align:center;}
        table{border-spacing: 0;border-collapse: collapse;}
        td, th{padding: 10px;border: 1px solid black;}
    </style>
</head>
<body>
<div class=border>
<?php
$db_server = "mysql2";
$db_user = "web_db";
$db_password = "Msk2025!";
$db_name = "my_db";
 
try {
    // Открываем соединение, указываем адрес сервера, имя бд, имя пользователя и пароль,
    // также сообщаем серверу в какой кодировке должны вводится данные в таблицу бд.
    $db = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    // Устанавливаем атрибут сообщений об ошибках (выбрасывать исключения)
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    // Запрос на вывод записей из таблицы
    $sql = "SELECT column1, column2 FROM myTable";
    // Подготовка запроса
    $statement = $db->prepare($sql);
    // Выполняем запрос
    $statement->execute();
    // Получаем массив строк 
    $result_array = $statement->fetchAll();
 
    echo "<table><tr><th>column1</th><th>column2</th>";
    foreach ($result_array as $result_row) {
        echo "<tr>";
        echo "<td>" . $result_row["column1"]  . "</td>";
        echo "<td>" . $result_row["column2"]    . "</td>";
        echo "</tr>";
    }
    echo "</table>"; 
}
 
catch(PDOException $e) {
    echo "Ошибка при создании записи в базе данных: " . $e->getMessage();
}
 
// Закрываем соединение
$db = null;
?> 
<br><br>
<p> <a href="/index.php">Вернуться назад</a> </p>
</div>
</body>
</html>
