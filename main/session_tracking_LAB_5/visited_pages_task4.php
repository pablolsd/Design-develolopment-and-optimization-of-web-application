<?php
session_start();

function addVisitedPage($page) {
    if (!isset($_SESSION['visited_pages'])) {
        $_SESSION['visited_pages'] = [];
    }

    $_SESSION['visited_pages'][] = $page;
}

$current_page = $_SERVER['REQUEST_URI'];
addVisitedPage($current_page);

$visited_pages = isset($_SESSION['visited_pages']) ? $_SESSION['visited_pages'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visited Pages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }

        h1 {
            color: #555;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <h1>List of Visited Pages</h1>

    <?php if (empty($visited_pages)): ?>
        <p>You haven't visited any pages yet.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($visited_pages as $page): ?>
                <li><a href="<?php echo $page; ?>"><?php echo $page; ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <p><a href="page1.php">Visit Page 1</a></p>
    <p><a href="page2.php">Visit Page 2</a></p>
    <p><a href="page3.php">Visit Page 3</a></p>

</body>
</html>
