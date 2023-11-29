<?php
$q = $_GET['q'];
$hints = array("Volvo", "BMW", "Toyota", "Ford", "Chevrolet", "Honda", "Mercedes", "Nissan", "Audi", "Hyundai");
$hint = "";
foreach($hints as $car) {
    if (strpos(strtolower($car), strtolower($q)) !== false) {
        if ($hint === "") {
            $hint = $car;
        } else {
            $hint .= ", $car";
        }
    }
}
echo $hint === "" ? "Нет подсказок" : $hint;
?>
