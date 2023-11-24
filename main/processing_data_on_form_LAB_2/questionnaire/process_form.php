<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST["name"];
    $birthdate = $_POST["birthdate"];
    $programmingLanguages = isset($_POST["programming_languages"]) ? $_POST["programming_languages"] : '';

    
    $age = calculateAge($birthdate);
    $languagesList = explode(',', $programmingLanguages);
    $numLanguages = count($languagesList);

    
    echo "<h2>Результат:</h2>";
    echo "<p>Имя: $name</p>";
    echo "<p>Дата рождения: $birthdate (Возраст: $age лет)</p>";
    echo "<p>Языки программирования: $programmingLanguages</p>";
    echo "<p>Количество изученных языков: $numLanguages</p>";
} else {
    
    header("Location: index.html");
}

function calculateAge($birthdate) {
    $today = new DateTime();
    $birthDateObj = new DateTime($birthdate);
    $age = $today->diff($birthDateObj)->y;
    return $age;
}
?>
