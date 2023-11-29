function loadPhoto() {
	var select = document.getElementById("photoSelect");
	var selectedPhoto = select.options[select.selectedIndex].value;

	
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function () {
			if (xhr.readyState == 4) {
					if (xhr.status == 200) {
							document.getElementById("photoContainer").innerHTML = '<img src="' + xhr.responseText + '" alt="Выбранная фотография">';
					} else {
							console.error("Ошибка при загрузке фотографии");
					}
			}
	};
	xhr.open("GET", "get_photo.php?photo=" + encodeURIComponent(selectedPhoto), true);
	xhr.send();
}
