<?php
session_start();


function setUserSettings($username, $background) {
    $_SESSION['user_settings'] = [
        'username' => $username,
        'background' => $background,
    ];
}


function getUserSettings() {
    
    return isset($_SESSION['user_settings']) ? $_SESSION['user_settings'] : [
        'username' => 'Гость',
        'background' => 'default.jpg',
    ];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = isset($_POST['username']) ? $_POST['username'] : 'Гость';
    $background = isset($_POST['background']) ? $_POST['background'] : 'default.jpg';

    
    setUserSettings($username, $background);
}


$userSettings = getUserSettings();


$users = isset($_SESSION['users']) ? $_SESSION['users'] : [];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_user'])) {
    $newUsername = isset($_POST['new_username']) ? $_POST['new_username'] : '';
    $newBackground = isset($_POST['new_background']) ? $_POST['new_background'] : 'default.jpg';

    if ($newUsername !== '') {
        $newUser = ['username' => $newUsername, 'background' => $newBackground];
        $users[] = $newUser;
        $_SESSION['users'] = $users;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user'])) {
    $deleteIndex = isset($_POST['delete_index']) ? $_POST['delete_index'] : null;
    
    if ($deleteIndex !== null && isset($users[$deleteIndex])) {
        unset($users[$deleteIndex]);
        $_SESSION['users'] = $users;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Settings</title>
  <style>
        body {
            background: url('<?php echo $userSettings['background']; ?>') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
            text-align: center;
            margin: 0;
            padding: 50px;
        }

        h1, h2 , ul {
            color: black;
        }

        form {
            display: inline-block;
            background: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }
    </style>
     
</head>
<body>

    <h1>Личные настройки пользователя</h1>

    <form method="post" action="">
        <label for="username">Ник:</label>
        <input type="text" name="username" id="username" value="<?php echo $userSettings['username']; ?>">

        <label for="background">Фон страницы (URL):</label>
        <input type="text" name="background" id="background" value="<?php echo $userSettings['background']; ?>">

        <button type="submit">Сохранить</button>
    </form>

    <h2>Список имеющихся пользователей</h2>
    <ul>
        <?php foreach ($users as $index => $user): ?>
            <li><?php echo $user['username']; ?> - <?php echo $user['background']; ?>
                <form method="post" action="">
                    <input type="hidden" name="delete_index" value="<?php echo $index; ?>">
                    <button type="submit" name="delete_user">Удалить</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Добавить нового пользователя</h2>
    <form method="post" action="">
        <label for="new_username">Ник:</label>
        <input type="text" name="new_username" id="new_username" required>

        <label for="new_background">Фон страницы (URL):</label>
        <input type="text" name="new_background" id="new_background" value="default.jpg">

        <button type="submit" name="add_user">Добавить</button>
    </form>

</body>
</html>

