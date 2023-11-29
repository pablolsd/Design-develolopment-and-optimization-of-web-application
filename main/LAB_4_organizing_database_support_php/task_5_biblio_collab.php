<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "BiblioCollabDB";


$conn = mysqli_connect($host, $user, $password, $database);


if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

$query = "
    SELECT b.Title as Book, COUNT(ba.AuthorID) as NumberOfAuthors
    FROM Books b
    JOIN BookAuthors ba ON b.BookID = ba.BookID
    GROUP BY b.BookID, b.Title
    HAVING NumberOfAuthors = 3;
";

$result = mysqli_query($conn, $query);


if ($result) {
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Книга: " . $row['Book'] . ", Количество соавторов: " . $row['NumberOfAuthors'] . "<br>";
    }
} else {
    echo "Ошибка выполнения запроса: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
