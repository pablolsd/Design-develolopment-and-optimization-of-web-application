-- Active: 1701147772488@@local@3000

CREATE TABLE IF NOT EXISTS country (
    id_c INT AUTO_INCREMENT PRIMARY KEY,
    name_c VARCHAR(50) NOT NULL
);


INSERT INTO country (name_c) VALUES
    ('Страна1'),
    ('Страна2'),
    ('Страна3');


CREATE TABLE IF NOT EXISTS products (
    id_p INT AUTO_INCREMENT PRIMARY KEY,
    section VARCHAR(50) NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    country_id INT,
    FOREIGN KEY (country_id) REFERENCES country(id_c)
);


INSERT INTO products (section, name, description, price, country_id) VALUES
    ('Секция1', 'Товар1', 'Описание товара 1', 19.99, 1),
    ('Секция2', 'Товар2', 'Описание товара 2', 29.99, 2),
    ('Секция1', 'Товар3', 'Описание товара 3', 39.99, 3);
