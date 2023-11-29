let imageIndex = 0;
  const images = [
    "https://via.placeholder.com/200",
    "https://via.placeholder.com/200/0000FF",
    "https://via.placeholder.com/200/FF0000"
  ];

  const captions = [
    "Подпись под изображением",
    "Изображение с синим цветом",
    "Изображение с красным цветом"
  ];

  function changeImage() {
    const image = document.getElementById("mainImage");
    imageIndex = (imageIndex + 1) % images.length;
    image.src = images[imageIndex];
    document.getElementById("caption").innerHTML = captions[imageIndex];
  }

  function changeColor() {
    const caption = document.getElementById("caption");
    const colors = ["red", "green", "blue"];
    const currentColor = window.getComputedStyle(caption, null).getPropertyValue("color");
    const currentIndex = colors.indexOf(currentColor);
    const nextColor = colors[(currentIndex + 1) % colors.length];
    caption.style.color = nextColor;
  }

  document.getElementById("mainImage").addEventListener("click", changeImage);