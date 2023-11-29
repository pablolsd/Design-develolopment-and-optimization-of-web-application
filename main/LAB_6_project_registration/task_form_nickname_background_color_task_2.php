<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Настройки пользователя</title>
		<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 20px;
    }

    form {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    input[type="text"],
    input[type="color"],
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        cursor: pointer;
				
    }

    p {
        font-size: 18px;
        margin-top: 20px;
    }

    div.output {
        margin-top: 20px;
        padding: 20px;
        border-radius: 5px;
    }

    div.output span {
        display: inline-block;
        width: 20px;
        height: 20px;
        margin-right: 10px;
        background-color: <?php echo isset($backgroundColor) ? $backgroundColor : '#ffffff'; ?>;
        border: 1px solid #ccc;
        border-radius: 3px;
    }
		label.color-label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
</style>

</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $username = $_POST["username"];
    $backgroundColor = $_POST["background_color"];

    
    echo "<p>Привет, $username!</p>";
    echo "<div style=\"background-color: $backgroundColor; padding: 20px;\">Это ваш новый фон</div>";
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="username">Ваш ник:</label>
    <input type="text" name="username" required>
    <br>

    <label for="background_color">Выберите цвет фона:</label>
    <input type="color" name="background_color" value="#ffffff" required>
    <br>

    <input type="submit" value="Сохранить">
</form>

</body>
</html>
