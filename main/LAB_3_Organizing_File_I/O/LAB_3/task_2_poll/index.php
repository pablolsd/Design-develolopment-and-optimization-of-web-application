<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Голосование</title>
		<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        p {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin-bottom: 10px;
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

        hr {
            margin: 20px 0;
            height: 20px;
            border: none;
        }
    </style>
</head>
<body>

<form method="post" action="">
    <p>Как вы оцениваете наш магазин?</p>
    <input type="radio" name="vote" value="5" checked> Отлично<br>
    <input type="radio" name="vote" value="4"> Хорошо<br>
    <input type="radio" name="vote" value="3"> Удовлетворительно<br>
    <input type="radio" name="vote" value="2"> Плохо<br>

    <input type="submit" name="submit" value="Проголосовать">
</form>

<form method="post" action="create_files.php">
    <p>Создать файлы для голосов:</p>
    <input type="submit" name="create" value="Создать">
</form>

<form method="post" action="delete_files.php">
    <p>Удалить все голоса:</p>
    <input type="submit" name="delete" value="Удалить">
</form>

<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['vote'])) {
        $file = $_POST['vote'] . ".txt";
        $f = fopen($file, "r");
        $votes = fread($f, 100);
        fclose($f);

        $votes++;
        
        $f = fopen($file, "w");
        fwrite($f, $votes);
        fclose($f);
        
        echo "<p>Результаты голосования:</p>";
        for ($i = 5; $i >= 2; $i--) {
            $filename = $i . ".txt";
            $f = fopen($filename, "r");
            $votes = fread($f, 100);
            fclose($f);
            
            echo "<p>$i: $votes голосов</p>";
            
    
            $vline = intval($votes) * 10; 
 
            echo "<hr align='left' color='#FF0000' size='20' width='$vline'>";
        }
    }
		
}
?>

</body>
</html>
