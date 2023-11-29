<?php

$hostname = "localhost";
$database = "CineCountries";
$username = "root";
$password = "";


$mysqli = new mysqli($hostname, $username, $password, $database);


if ($mysqli->connect_error) {
    die("Ошибка подключения к базе данных: " . $mysqli->connect_error);
}


$sql = "
    DELETE FROM Связь_Фильмы_Страны
    WHERE Фильм_ID NOT IN (SELECT ID FROM Фильмы)
       OR Страна_ID NOT IN (SELECT ID FROM Страны)
";


if ($mysqli->query($sql) === TRUE) {
    echo "Мусорные записи успешно удалены.";
} else {
    echo "Ошибка выполнения запроса: " . $mysqli->error;
}


$mysqli->close();
?>
