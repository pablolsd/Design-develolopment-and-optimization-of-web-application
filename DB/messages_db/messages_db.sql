CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    message_text TEXT NOT NULL,
    send_datetime DATETIME NOT NULL
);
