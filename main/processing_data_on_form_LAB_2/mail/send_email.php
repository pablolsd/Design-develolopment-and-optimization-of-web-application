<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $to = $_POST["to"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    
    $mail = "troyshoy333@gmail.com";

    
    $result = mail($to, $subject, $message);

    
    if ($result) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email. Please try again.";
    }
} else {
    
    header("Location: park\\2\\index.html");
    exit();
}

?>
