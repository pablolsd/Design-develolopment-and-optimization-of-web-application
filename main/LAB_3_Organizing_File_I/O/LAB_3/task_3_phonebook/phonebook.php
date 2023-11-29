<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];

    $data = [];

    
    if (file_exists('phonebook.json')) {
        $data = json_decode(file_get_contents('phonebook.json'), true);
    }

    
    $data[] = ["name" => $name, "phone" => $phone];

    
    file_put_contents('phonebook.json', json_encode($data, JSON_PRETTY_PRINT));
}


$contacts = [];
if (file_exists('phonebook.json')) {
    $contacts = json_decode(file_get_contents('phonebook.json'), true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Телефонный справочник</title>
</head>
<style>
       <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }
    </style>
<body>

<h2>Телефонный справочник</h2>


<form method="post" action="">
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" required>

    <label for="phone">Телефон:</label>
    <input type="number" id="phone" name="phone" required>

    <input type="submit" value="Добавить номер">
</form>

<h2>Список контактов</h2>

<?php
if (!empty($contacts)) {
    echo '<ul>';
    foreach ($contacts as $contact) {
        echo '<li>' . $contact['name'] . ': ' . $contact['phone'] . '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>Телефонный справочник пуст.</p>';
}
?>

</body>
</html>
