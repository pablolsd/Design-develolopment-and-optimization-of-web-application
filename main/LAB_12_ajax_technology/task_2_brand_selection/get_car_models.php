<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedMake = $_POST["make"];
    $models = getCarModelsFromDatabase($selectedMake);

    foreach ($models as $model) {
        echo "<option value='$model'>$model</option>";
    }
}

function getCarModelsFromDatabase($make) {
    return ["Model1", "Model2", "Model3"];
}
?>
