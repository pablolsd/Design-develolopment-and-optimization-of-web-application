function validateForm() {
	var furniture = document.getElementById("furniture").value;
	var material = document.getElementById("material").value;
	var quantity = document.getElementById("quantity").value;

	
	if (furniture === "" || material === "" || quantity === "") {
			alert("Ошибка: Заполните все поля формы.");
			return false;
	}

	

	return true; 
}
