

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!extension_loaded('mysqli')) {
	die('Расширение MySQLi не найдено. Убедитесь, что оно включено в настройках PHP.');
}

$host = "localhost";
$user = "root";
$pass = "";
$database = "baza1";

$mysqli = new mysqli($host, $user, $pass, $database);

if ($mysqli->connect_error) {
	die("Ошибка подключения: " . $mysqli->connect_error);
}

if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

try {

    $createDatabase = "CREATE DATABASE IF NOT EXISTS $database";
    if (!$mysqli->query($createDatabase)) {
        throw new Exception("Ошибка при создании базы данных: " . $mysqli->error);
    }
    
   
    $mysqli->select_db($database) or die("Ошибка выбора базы данных: " . $mysqli->error);
    
    
    $createTable = "CREATE TABLE IF NOT EXISTS telephones (
        id INT AUTO_INCREMENT PRIMARY KEY,
        surname VARCHAR(20),
        email VARCHAR(20),
        tel VARCHAR(20)
    )";
    if (!$mysqli->query($createTable)) {
        throw new Exception("Ошибка при создании таблицы: " . $mysqli->error);
    }
    
    
    $createCustomTable = "CREATE TABLE IF NOT EXISTS my_custom_table (
        custom_id INT AUTO_INCREMENT PRIMARY KEY,
        custom_name VARCHAR(50),
        custom_description TEXT
    )";
    if (!$mysqli->query($createCustomTable)) {
        throw new Exception("Ошибка при создании таблицы: " . $mysqli->error);
    }
    
    
    $insertData = "INSERT INTO telephones (surname, email, tel) VALUES
        ('Иванов', 'ivanov@mail.com', '123456789'),
        ('Петров', 'petrov@mail.com', '987654321')";
    if (!$mysqli->query($insertData)) {
        throw new Exception("Ошибка при заполнении таблицы: " . $mysqli->error);
    }
    
    
    $insertCustomData = "INSERT INTO my_custom_table (custom_name, custom_description) VALUES
        ('Пример 1', 'Описание 1'),
        ('Пример 2', 'Описание 2')";
    if (!$mysqli->query($insertCustomData)) {
        throw new Exception("Ошибка при заполнении таблицы: " . $mysqli->error);
    }

    
    $selectData = "SELECT * FROM telephones";
    $result = $mysqli->query($selectData);

    if ($result->num_rows > 0) {
        echo "<br>Записи в таблице telephones:<br>";
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . ", Фамилия: " . $row["surname"] . ", Email: " . $row["email"] . ", Телефон: " . $row["tel"] . "<br>";
        }
    } else {
        echo "Таблица telephones пуста.<br>";
    }

    
    $selectCustomData = "SELECT * FROM my_custom_table";
    $resultCustom = $mysqli->query($selectCustomData);

    if ($resultCustom->num_rows > 0) {
        echo "<br>Записи в собственной таблице my_custom_table:<br>";
        while ($row = $resultCustom->fetch_assoc()) {
            echo "ID: " . $row["custom_id"] . ", Имя: " . $row["custom_name"] . ", Описание: " . $row["custom_description"] . "<br>";
        }
    } else {
        echo "Собственная таблица my_custom_table пуста.<br>";
    }
} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage();
} finally {
    
    $mysqli->close();
}
?>
