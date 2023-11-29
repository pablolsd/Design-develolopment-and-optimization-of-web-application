### Первый код:

```html
<!DOCTYPE html>
<html>
<head>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script>
    $(document).ready(function () {
      $("#but1").click(function () {
        $("#test").hide();
      });
      $("#but2").click(function () {
        $("#test").show();
      });
    });
  </script>
</head>
<body>
  <h2>This is a heading 2</h2>
  <p>This is a paragraph.</p>
  <p id="test">This is another paragraph.</p>
  <button id="but1">Click me</button>
  <button id="but2">Click me for show</button>
</body>
</html>
```

### Второй код:

```html
<!DOCTYPE html>
<html>
<head>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script>
    $(document).ready(function () {
      $("button").click(function () {
        $(".test").hide();
      });
    });
  </script>
</head>
<body>
  <h2 class="test">This is a heading</h2>
  <p class="test">This is a paragraph.</p>
  <p>This is another paragraph.</p>
  <button>Click me</button>
</body>
</html>
```

### Отличия:

1. **Селекторы и идентификаторы:**
   - В первом коде используются идентификаторы (`#but1`, `#but2`, `#test`) для выбора конкретных элементов.
   - Во втором коде используется более обобщенный селектор (`button`) и классы (`test`) для выбора элементов.

2. **Обработчики событий:**
   - В первом коде события click привязаны к конкретным кнопкам (`#but1`, `#but2`).
   - Во втором коде событие click привязано ко всем кнопкам (`button`).

3. **Скрытие элементов:**
   - В первом коде используется `$("#test").hide()` и `$("#test").show()` для скрытия и отображения элемента с id "test".
   - Во втором коде используется `$(".test").hide()` для скрытия всех элементов с классом "test".