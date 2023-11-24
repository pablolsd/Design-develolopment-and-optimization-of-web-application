<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calc</title>
		<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label, input, select {
            display: block;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="num1">Введите первое число:</label>
    <input type="number" name="num1" required>

    <label for="operation">Выберите операцию:</label>
    <select name="operation" required>
        <option value="add">Сложение</option>
        <option value="subtract">Вычитание</option>
        <option value="multiply">Умножение</option>
        <option value="divide">Деление</option>
    </select>

    <label for="num2">Введите второе число:</label>
    <input type="number" name="num2" required>

    <input type="submit" value="Вычислить">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operation = $_POST["operation"];

    switch ($operation) {
        case "add":
            $result = $num1 + $num2;
            break;
        case "subtract":
            $result = $num1 - $num2;
            break;
        case "multiply":
            $result = $num1 * $num2;
            break;
        case "divide":

            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = "Деление на ноль невозможно";
            }
            break;
        default:
            $result = "Выберите операцию";
            break;
    }

   
    echo "<p>Результат: $result</p>";
}
?>

</body>
</html>
