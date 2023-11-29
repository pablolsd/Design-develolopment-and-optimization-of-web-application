<?php
$photoName = $_GET["photo"];


$photos = array(
    "photo1" => "pics/photo1.jpg",
    "photo2" => "pics/photo2.jpg",
    "photo3" => "pics/photo3.jpg"
);


if (array_key_exists($photoName, $photos)) {
    echo $photos[$photoName];
} else {
    echo "error";
}
?>
