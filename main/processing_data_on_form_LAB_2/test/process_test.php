<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $answers = [
        "question1" => ["php", "javascript"],
        "question2" => ["laravel", "django"],
        "question3" => ["phpunit", "pytest", "mocha"]
    ];

    $userAnswers = $_POST;

    $totalPoints = 0;

    foreach ($answers as $question => $correctOptions) {
        if (isset($userAnswers[$question]) && is_array($userAnswers[$question])) {
            $userSelection = $userAnswers[$question];
            $intersection = array_intersect($userSelection, $correctOptions);
            $totalPoints += count($intersection);
        }
    }

   
    echo "<h2>Результаты теста:</h2>";
    echo "<p>Вы набрали $totalPoints баллов.</p>";

    
    if ($totalPoints >= 5) {
        echo "<p>Отличный результат! Вы хорошо знаете выбранные темы.</p>";
    } elseif ($totalPoints >= 3) {
        echo "<p>Неплохо! Вам стоит углубить знания в некоторых областях.</p>";
    } else {
        echo "<p>Есть куда расти. Обратите внимание на основные концепции.</p>";
    }
} else {
    
    header("Location: index.html");
}
?>
