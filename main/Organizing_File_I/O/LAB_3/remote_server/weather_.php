<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Погодное приложение</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1, p {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        select, input {
            padding: 8px;
            margin: 5px;
        }

        div {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<?php
$apiKey = 'd5c2aa7787692bfda24e0dee3baa0808'; 

$cities = ['Moscow', 'New York', 'London', 'Tokyo', 'Beijing', 'Paris', 'Berlin', 'Sydney', 'Rio de Janeiro', 'Cairo'];

$city = isset($_GET['city']) ? $_GET['city'] : 'Moscow';

$apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey";

$response = file_get_contents($apiUrl);

if ($response) {
    $data = json_decode($response, true);

    $weatherDescription = strtolower($data['weather'][0]['description']);
    $temperature = $data['main']['temp']- 273.15;
    $humidity = $data['main']['humidity'];

    echo "<div style='background-color: " . getBackgroundColor($weatherDescription) . ";'>";
    echo "<h1>Погода в $city</h1>";
    echo "<p>Описание: $weatherDescription</p>";
    echo "<p>Температура: $temperature °C</p>";
    echo "<p>Влажность: $humidity%</p>";
    echo "</div>";
} else {
    echo "<p>Невозможно получить данные о погоде</p>";
}

echo "<form method='get'>";
echo "<label for='city'>Выберите город: </label>";
echo "<select name='city' id='city'>";
foreach ($cities as $c) {
    echo "<option value='$c' " . ($c == $city ? 'selected' : '') . ">$c</option>";
}
echo "</select>";
echo "<input type='submit' value='Получить погоду'>";
echo "</form>";

function getBackgroundColor($weatherDescription) {
    
    switch ($weatherDescription) {
        case 'ясно':
            return '#87CEEB'; 
        case 'облачно':
            return '#A9A9A9';
        case 'дождь':
            return '#4682B4'; 
        default:
            return '#f0f0f0'; 
    }
}
?>

</body>
</html>

