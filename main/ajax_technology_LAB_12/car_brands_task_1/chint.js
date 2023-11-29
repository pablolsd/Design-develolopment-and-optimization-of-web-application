function showHint(str) {
	if (str.length == 0) {
			document.getElementById("txtHint").innerHTML = "";
			return;
	} else {
			try {
					xmlHttp = new XMLHttpRequest();
			} catch (e) {
					try {
							xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
					} catch (e) {
							try {
									xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
							} catch (e) {
									alert("AJAX не поддерживается вашим браузером!");
									return false;
							}
					}
			}
			
			var url = "gethint.php?q=" + str + "&sid=" + Math.random();
			xmlHttp.onreadystatechange = stateChanged;
			xmlHttp.open("GET", url, true);
			xmlHttp.send();
	}
}

function stateChanged() {
	if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.getElementById("txtHint").innerHTML = xmlHttp.responseText;
	}
}
