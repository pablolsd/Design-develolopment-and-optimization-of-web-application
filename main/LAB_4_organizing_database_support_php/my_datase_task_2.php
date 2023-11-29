<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baze1";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$queryCreateCountryTable = "CREATE TABLE country (
    id_c INT PRIMARY KEY,
    name_c VARCHAR(255) NOT NULL
)";
$conn->query($queryCreateCountryTable);


$queryInsertCountryData = "INSERT INTO country (id_c, name_c) VALUES
(1, 'USA'),
(2, 'China'),
(3, 'Germany')";
$conn->query($queryInsertCountryData);


$queryCreateProductsTable = "CREATE TABLE products (
    id_p INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    section VARCHAR(255) NOT NULL,
    id_country INT,
    FOREIGN KEY (id_country) REFERENCES country(id_c)
)";
$conn->query($queryCreateProductsTable);


$queryInsertProductsData = "INSERT INTO products (id_p, name, description, price, section, id_country) VALUES
(1, 'Product1', 'Description1', 10.99, 'Electronics', 1),
(2, 'Product2', 'Description2', 20.99, 'Clothing', 2),
(3, 'Product3', 'Description3', 15.99, 'Home Appliances', 3)";
$conn->query($queryInsertProductsData);


$sql = "SELECT country.name_c, products.section, products.name, products.description, products.price
        FROM products
        JOIN country ON country.id_c = products.id_country
        ORDER BY products.section";


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Country: " . $row["name_c"] . "<br>";
        echo "Section: " . $row["section"] . "<br>";
        echo "Product Name: " . $row["name"] . "<br>";
        echo "Description: " . $row["description"] . "<br>";
        echo "Price: $" . $row["price"] . "<br><br>";
    }
} else {
    echo "0 results";
}


$conn->close();
?>
