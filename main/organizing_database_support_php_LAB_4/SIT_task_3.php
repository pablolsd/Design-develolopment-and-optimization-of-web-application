<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "baze1";

$mysqli = new mysqli($host, $user, $pass);

if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}




$mysqli->select_db($database) or die("Ошибка выбора базы данных: " . $mysqli->error);


$tableExistsQuery = "SHOW TABLES LIKE 'products'";
$tableExistsResult = $mysqli->query($tableExistsQuery);

if ($tableExistsResult->num_rows == 0) {
    die("Таблица 'products' не существует в базе данных 'baza1'.");
}

$query = "SELECT country.name_c, products.section, products.name, products.description, products.price
          FROM products
          INNER JOIN country ON country.id_c = products.country_id
          ORDER BY products.section, products.price";

$result = $mysqli->query($query);

if (!$result) {
    die("Ошибка запроса: " . $mysqli->error);
}

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Страна</th>
                <th>Секция</th>
                <th>Наименование товара</th>
                <th>Описание товара</th>
                <th>Цена</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['name_c']}</td>
                <td>{$row['section']}</td>
                <td>{$row['name']}</td>
                <td>{$row['description']}</td>
                <td>{$row['price']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Нет данных для отображения.";
}

$mysqli->close();
?>
