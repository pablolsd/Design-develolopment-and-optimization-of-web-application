<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $furniture = $_POST["furniture"];
    $material = $_POST["material"];
    $quantity = $_POST["quantity"];

    
    if (empty($furniture) || empty($material) || empty($quantity)) {
        echo "Ошибка: Заполните все поля формы.";
    } else {
        
			echo "<div class='container'>";
			echo "<h1>Ваш заказ принят</h1>";
			echo "<p>Заказано изделие: $furniture</p>";
			echo "<p>Материал: $material</p>";
			echo "<p>Количество: $quantity</p>";
			echo "</div>";
    }
} else {
  
	echo "<div class='container alert alert-error'>";

	echo "<p>Ошибка: Заполните все поля формы.</p>";

	echo "</div>";

}
?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="style.css">
</head>
</html>