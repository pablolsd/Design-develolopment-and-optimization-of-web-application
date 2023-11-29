<?php
$fio = $address = $email = $password = '';
$showForm = true; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $fio = $_POST['fio'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    echo "Ф.И.О.: $fio <br>";
    echo "Адрес: $address <br>";
    echo "Email: $email <br>";
    echo "Пароль: $password <br>";

   
    $correctPassword = '123';
    if ($password === $correctPassword) {
       
        $showForm = false;

        echo "Поздравляем! Вы ввели правильный пароль!";
    } else {
        echo "Неверный пароль. Попробуйте снова.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма и обработка данных</title>
		<style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(to right, #4e54c8, #8f94fb);
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        label {
            display: block;
            margin: 10px 0;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
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
    <?php
    if ($showForm) {
    ?>
    <form method="post" action="">
        <label for="fio">Ф.И.О.:</label>
        <input type="text" id="fio" name="fio" required><br>

        <label for="address">Адрес:</label>
        <input type="text" id="address" name="address" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Отправить</button>
    </form>
    <?php
    }
    ?>
</body>
</html>
