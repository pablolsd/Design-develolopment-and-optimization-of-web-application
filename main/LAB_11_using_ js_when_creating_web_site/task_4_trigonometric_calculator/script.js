function calculate() {
	var angleInput = document.getElementById('angle');
	var resultDiv = document.getElementById('result');

	
	var angle = parseFloat(angleInput.value);
	if (isNaN(angle)) {
			resultDiv.innerHTML = 'Введите корректное значение угла.';
			return;
	}

	
	var radians = angle * (Math.PI / 180);
	var sinValue = Math.sin(radians);
	var cosValue = Math.cos(radians);
	var tanValue = Math.tan(radians);

	
	resultDiv.innerHTML = 'Синус: ' + sinValue.toFixed(4) + '<br>' +
												'Косинус: ' + cosValue.toFixed(4) + '<br>' +
												'Тангенс: ' + tanValue.toFixed(4);
}
