<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Практическая н1</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 20px auto;
            color: #333;
        }
        h1 {
            color: #0066cc;
        font-size : 16px;
        }
        p {
            line-height: 1.6;
            color: #666;

        }
        table {
            border-collapse : collapse;
            width : 100%;
        }

        td , th {
            border : 1 px solid #000;
            padding : 8px;
            text-algin:center;
        }
    </style>
</head>
<body>
<?php 
//Задание 1 

echo"<h1>Задание 1</h1><br>"; 

$product1 = "Product1";
$price1 = 14.3;

$product2 = "Product2";
$price2 = 756.3;

$product3 = "Product3";
$price3 = 43.3;

//Задание 2
function max_price_product ($product1,$price1,$product2,$price2,$product3,$price3) {

if ($price1 > $price2 && $price1 > $price3){
    $max_product = $product1;
    $max_price = $price1;
} elseif ($price2 > $price3){
    $max_product = $product2;
    $max_price = $price2;
} else {
    $max_product = $product3;
    $max_price = $price3;
}
 echo "Самый дорогой продукт : $max_product , $$max_price <br>";  
}


echo "Product : $product1, Price1 : $$price1 <br>";
echo "Product : $product2, Price2 : $$price2 <br>";
echo "Product : $product3, Price3 : $$price3<br><hr>";

echo"<h1>Задание 2</h1><br>"; 
max_price_product("Product 1" , 11 , "Product 2" , 22 , "Product 3 " , 33);
max_price_product("Product A" , 44 , "Product B" , 55 , "Product C " , 66);
max_price_product("Product X" , 77 , "Product Y" , 88 , "Product Z " , 99);

//Задание 3 
echo"<hr><h1>Задание 3 </h1><br>"; 
function check_password($password){
    $correct_password = "password123";
    if ($password == $correct_password) {
        echo "Пороль верный";
    } else {
        return "Пороль не верный<br><hr>";
    } 
}

echo check_password("pasword12345");



//Задание 4
echo"<h1>Задание 4</h1><br>"; 
$priceenf = 100;
$inflation = 0.1;
$year = 2023;

while ($year <= 2032) {
    echo "Год : $year , Цена : $priceenf , Инфлияция : $inflation<br>";
    $priceenf += $priceenf * $inflation ;
    if ($priceenf >= 170) {
        $inflation -= 0.035;
    }
    $inflation += 0.035;
    $year++;
}


//Задание 5
echo"<hr><h1>Задание 5</h1><br>"; 
$products = array("Товар4" , "Товар3","Товар1","Товар2","Товар5");
$products[] = "Товар6"; 
$products[] = "Товар7";

$count = count ($products);
for ($i = 0; $i < $count; $i++){
    echo $products[$i] . "<br>";

}

sort($products);
echo "Исходный массив : " . implode(", " , $products) . "<br>";
sort($products , SORT_STRING | SORT_FLAG_CASE);
echo "Отсортированый массив :" . implode(", " , $products) . "<br><hr>";

//Задание 6 
echo"<h1>Задание 6<h1><br></h1>"; 
$tovar_prices = array('Product1' => 100,'Product2' => 50, 'Product3' => 90);
$tovar_prices['Product4'] = 120;
$tovar_prices['Product5'] = 90;

$example = array('Product1' => 100,'Product2' => 50, 'Product3' => 90);
$example['Product4'] = 120;
$example['Product5'] = 90;

//$products = count($products);
//$price = array_sum($product);
//echo "\nОбщая количество товаров : $product\n";
//echo "Сумма стоимости : $price\n";

//if (is_array ($product)){


foreach ($tovar_prices as $product => $price) {
    echo "Товар : $product  , Цена : $price <br>";
}

$count = count ($tovar_prices);
$total_price = array_sum($tovar_prices);

asort($tovar_prices);
echo"Массив после сортировки по цене : <br>";
foreach ($tovar_prices as $tovar_prices => $price){
    echo "Товар : $product , Цена : $price <br>";

}

ksort($example);

echo "Массив после сортировки по алфавиту : <br>";
foreach ($products as $product => $price) {

    echo "Товар : $product , Цена : $price <br>";
} 

//}
//else {

  //  echo "Ошибка : Переменная не является массивом.\n";
//}

//Задание  7
$name = "Сергей";
$profession = "Програмист";
$skills = "PHP , HTML , JS";
$expirience = "4 года в разработке";
$email = "lucenko509@gmail.com";
$university = "ВГУИТ";
$specialization = "Разработчик веб приложений";

echo"<hr><h1>Задание 7<h1><br>
<h1>Моя страница разработчика </h1>

<p><strong>Имя :</strong>$name</p>
<p><strong>Профессия :</strong>$profession</p>
<p><strong>Навыки :</strong>$skills</p>
<p><strong>Стаж :</strong>$expirience</p>
<p><strong>Почта :</strong>$email</p>
<p><strong>Место учёбы  :</strong>$university</p>
<p><strong>Специальность :</strong>$specialization</p>" ;



echo "<br><hr><h1>Задание 8</h1><hr>";

echo "<table>";
for ($r = 0; $r <= 255; $r += 51) {
    for ($g = 0; $g <= 255; $g += 51) {
        for ($b = 0; $b <= 255; $b += 51) {
            $color = "#" . dechex($r) . dechex($g) . dechex($b);
            echo "<td style='background-color:$color'>$color</td>";
        }
        echo "</tr><tr>";
    }
    echo "</tr><tr>";
}
echo "</tr></table>";

//Задание 9
echo "<br><hr><h1>Задание 9</h1><hr>";
function generateRandomNumbers($n) {
  $sum = 0;
  $min = 1; 
  $max = 99; 
  while ($sum < $n) {
    $randomNumber = rand($min, $max);
    $sum += $randomNumber;
    echo $randomNumber . "<br>";
  }
}

generateRandomNumbers(100); 


?>

</body>
</html>
