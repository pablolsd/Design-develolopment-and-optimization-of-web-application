<?php
if(isset($_POST['userName'])) {
    $userName = $_POST['userName'];
    setcookie('userName', $userName, time() + 3600, '/');
} else {
    $userName = isset($_COOKIE['userName']) ? $_COOKIE['userName'] : '';
}

if(isset($userName)) {
    echo "Привет, $userName!";
    
    if($userName == 'John') {
        $background = 'john_background.jpg';
    } elseif($userName == 'Jane') {
        $background = 'jane_background.jpg';
    } else {
        $background = 'default_background.jpg';
    }
} else {
    echo "Привет, гость!";
    $background = 'default_background.jpg';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        body {
            background-image: url('<?php echo $background; ?>');
            background-size: cover;
            color: #fff;
            text-align: center;
            padding: 100px;
            font-family: Arial, sans-serif;
        }
				h1 , p {
					color : black ;
				}
    </style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        body {
            background-image: url('<?php echo $background; ?>');
            background-size: cover;
            color: #fff;
            text-align: center;
            padding: 100px;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <h1>Добро пожаловать на наш сайт!</h1>
    <p>Это уникальная страница приветствия с фоном, изменяющимся в зависимости от вашего имени.</p>
    <p>Рады видеть вас, <?php echo isset($userName) ? $userName : 'гость'; ?>!</p>
    
</body>
</html>

</body>
</html>
