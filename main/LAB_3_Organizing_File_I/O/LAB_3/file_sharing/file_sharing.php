<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Exchange App</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            align-items: flex-start;
        }

        li {
            margin: 10px;
            flex: 0 0 300px; 
            max-width: 100%;
        }

        a {
            color: #0066cc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="file"] {
            padding: 8px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #0066cc;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #004080;
        }

        div {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        img {
            max-width: 100%;
            max-height: 300px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<?php
$uploadFolder = 'receiver'; 
$maxFileSize = 10 * 1024 * 1024; 
$allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'txt']; 


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];

    
    if ($file['size'] > $maxFileSize) {
        echo "<p>Ошибка: Размер файла превышает допустимый лимит ($maxFileSize байт).</p>";
    } else {
        $fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        
        if (!in_array($fileType, $allowedFileTypes)) {
            echo "<p>Ошибка: Недопустимый тип файла. Разрешены только файлы: " . implode(', ', $allowedFileTypes) . ".</p>";
        } else {
            
            $fileName = uniqid('file_') . '.' . $fileType;

            
            $filePath = $uploadFolder . '/' . $fileName;

           
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                echo "<p>Файл успешно загружен: $fileName</p>";
            } else {
                echo "<p>Ошибка при загрузке файла.</p>";
            }
        }
    }
}


$fileList = glob($uploadFolder . '/*');
if ($fileList) {
    echo "<h2>Список загруженных файлов:</h2>";
    echo "<ul>";
    foreach ($fileList as $file) {
        $fileName = basename($file);
        $fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        echo "<li>";
        echo "<a href='/{$uploadFolder}/{$fileName}' target='_blank'>$fileName</a> | <a href='?delete=$fileName'>Удалить</a>";

       
        if (in_array($fileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "<br>";
            echo "<img src='data:image/{$fileType};base64," . base64_encode(file_get_contents($file)) . "' alt='$fileName'>";
        }

        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Нет загруженных файлов.</p>";
}


if (isset($_GET['delete'])) {
    $fileToDelete = $uploadFolder . '/' . $_GET['delete'];
    if (file_exists($fileToDelete)) {
        unlink($fileToDelete);
        echo "<p>Файл успешно удален: " . $_GET['delete'] . "</p>";
    } else {
        echo "<p>Ошибка: Файл не найден.</p>";
    }
}
?>


<form method="post" enctype="multipart/form-data">
    <label for="file">Выберите файл:</label>
    <input type="file" name="file" id="file" required>
    <br>
    <input type="submit" value="Загрузить файл">
</form>

</body>
</html>
