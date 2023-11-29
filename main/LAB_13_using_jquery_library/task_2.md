# Отличие в коде

## До

```html
<!DOCTYPE html>

<html>

<head>

<script src="http://code.jquery.com/jquery-latest.js">

</script>

<script>

$(document).ready(function () { $("button").click(function () { $("p").hide(); }); });

</script>

</head>

<body>

<h2>This is a heading</h2>

<p>This is a paragraph.</p>

<p>This is another paragraph.</p>

<button>Click me</button>

</body>

</html>
```

## После

```html
<!DOCTYPE html>

<html>

<head>

<script src="http://code.jquery.com/jquery-latest.js">

</script>

<script>

$(document).ready(function () { $("button").click(function () { $("#test").hide(); }); });

</script>

</head>

<body>

<h2>This is a heading 2</h2>

<p>This is a paragraph.</p>

<p id="test">This is another paragraph.</p>

<button>Click me</button>

</body>

</html>
```

### Отличия

1. Изменен селектор в функции обработчика события `click`: в первом коде скрывались все элементы `p` (`$("p").hide()`), во втором коде скрывается только элемент с id `test` (`$("#test").hide()`).
2. Изменен текст заголовка в `<h2>`: во втором коде используется "This is a heading 2", в то время как в первом коде "This is a heading".
3. Добавлен атрибут `id="test"` для второго параграфа (`<p id="test">This is another paragraph.</p>`), что соответствует изменению селектора в функции скрытия элемента.