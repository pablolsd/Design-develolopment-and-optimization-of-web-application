<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baze1";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST["email"];
    $message_text = $_POST["message_text"];

    
    $send_datetime = date("Y-m-d H:i:s");

   
$sql = "INSERT INTO messages (email, message_text, send_datetime) VALUES ('$email', '$message_text', '$send_datetime')";

if ($conn->query($sql) === TRUE) {
    echo "Сообщение успешно добавлено в базу данных.";
} else {
    echo "Ошибка при добавлении сообщения: " . $conn->error;
}

    if ($conn->query($sql) === TRUE) {
        echo "Сообщение успешно добавлено в базу данных.";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма отправки сообщения</title>
</head>
<body>
    <h2>Отправить сообщение</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="email">Адрес электронной почты:</label>
        <input type="email" name="email" required maxlength="50"><br>

        <label for="message_text">Текст сообщения:</label>
        <textarea name="message_text" rows="4" required maxlength="250"></textarea><br>

        <input type="submit" value="Отправить">
    </form>
</body>
</html>
