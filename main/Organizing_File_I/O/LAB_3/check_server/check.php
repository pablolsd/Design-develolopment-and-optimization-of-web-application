<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проверка доступности сервера</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            padding: 8px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
        }

        p {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<h2>Проверка доступности сервера</h2>

<form method="post" action="">
    <label for="serverAddress">Адрес сервера:</label>
    <input type="text" id="serverAddress" name="serverAddress" placeholder="http://example.com" required>

    <button type="submit">Проверить доступность</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serverAddress = $_POST["serverAddress"];
    $headers = @get_headers($serverAddress);

    if ($headers && strpos($headers[0], "200")) {
        echo '<p style="color: green;">Сервер доступен.</p>';
    } else {
        echo '<p style="color: red;">Сервер недоступен.</p>';
    }
}
?>

</body>
</html>
