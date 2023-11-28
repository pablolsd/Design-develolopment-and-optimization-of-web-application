<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $_SESSION["users"][$username] = ["password" => $password];
    echo "Регистрация успешна.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (isset($_SESSION["users"][$username]) && password_verify($password, $_SESSION["users"][$username]["password"])) {
        $_SESSION["user"] = $username;
        echo "Авторизация успешна.";
    } else {
        echo "Неверные учетные данные.";
    }
}

function isUserLoggedIn() {
    return isset($_SESSION["user"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isUserLoggedIn() && isset($_POST["add_message"])) {
    $username = $_SESSION["user"];
    $message = $_POST["message"];

    if (!isset($_SESSION["messages"])) {
        $_SESSION["messages"] = [];
    }

    $_SESSION["messages"][] = ["user" => $username, "message" => $message];
    echo "Сообщение добавлено.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пример регистрации и авторизации</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            margin-bottom: 10px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, textarea {
            width: 100%;
            max-width: 300px; 
            padding: 8px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php if (!isUserLoggedIn()): ?>
        <h2>Регистрация</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="username">Имя пользователя:</label>
            <input type="text" name="username" required>
            <label for="password">Пароль:</label>
            <input type="password" name="password" required>
            <button type="submit" name="register">Зарегистрироваться</button>
        </form>

        <h2>Авторизация</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="username">Имя пользователя:</label>
            <input type="text" name="username" required>
            <label for="password">Пароль:</label>
            <input type="password" name="password" required>
            <button type="submit" name="login">Войти</button>
        </form>
    <?php else: ?>
        <h2>Добавить сообщение</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="message">Сообщение:</label>
            <textarea name="message" required></textarea>
            <button type="submit" name="add_message">Добавить сообщение</button>
        </form>
    <?php endif; ?>
</body>
</html>
