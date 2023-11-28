
CREATE TABLE Фильмы (
    ID INT PRIMARY KEY,
    Название VARCHAR(255),
    Год_выпуска INT
);


CREATE TABLE Страны (
    ID INT PRIMARY KEY,
    Название VARCHAR(255)
);


CREATE TABLE Связь_Фильмы_Страны (
    Фильм_ID INT,
    Страна_ID INT,
    PRIMARY KEY (Фильм_ID, Страна_ID),
    FOREIGN KEY (Фильм_ID) REFERENCES Фильмы(ID) ON DELETE CASCADE,
    FOREIGN KEY (Страна_ID) REFERENCES Страны(ID) ON DELETE CASCADE
);
