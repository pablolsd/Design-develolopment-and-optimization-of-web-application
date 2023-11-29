<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $majorAxis = $_POST["majorAxis"];
  $minorAxis = $_POST["minorAxis"];

  echo json_encode(["status" => "success"]);
} else {
  echo json_encode(["status" => "error"]);
}
?>
