### Назначение jQuery

jQuery — это быстрая, легкая и мощная библиотека JavaScript, облегчающая взаимодействие с HTML-документом, обработку событий, анимацию, работу с AJAX и многие другие задачи. Её цель — упростить написание кода на JavaScript и сделать его более кросс-браузерным.

### Работа с библиотекой jQuery

Для использования jQuery необходимо подключить её к HTML-странице. Обычно это делается с использованием тега `<script>` и ссылки на файл с библиотекой:

```html
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
```

После подключения библиотеки можно начать использовать её функционал.

### jQuery Синтаксис

Синтаксис jQuery основан на использовании функции `$()`, которая принимает селектор и возвращает объект jQuery. Например:

```javascript
$(document).ready(function() {
    // Код, который будет выполнен после полной загрузки документа
    // ...
});
```

Или в более короткой форме:

```javascript
$(function() {
    // Код, который будет выполнен после полной загрузки документа
    // ...
});
```

### jQuery Селекторы

Селекторы в jQuery используются для выбора HTML-элементов и осуществления действий с ними. Примеры селекторов:

- Выбор элементов по тегу:

    ```javascript
    $("p") // Выбирает все параграфы
    ```

- Выбор элементов по классу:

    ```javascript
    $(".example") // Выбирает все элементы с классом "example"
    ```

- Выбор элементов по идентификатору:

    ```javascript
    $("#uniqueID") // Выбирает элемент с идентификатором "uniqueID"
    ```

- Комбинированные селекторы:

    ```javascript
    $("ul li") // Выбирает все элементы li внутри элементов ul
    ```
