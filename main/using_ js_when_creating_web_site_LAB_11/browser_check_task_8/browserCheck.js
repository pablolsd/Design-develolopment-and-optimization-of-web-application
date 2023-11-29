function getBrowserName() {
	const userAgent = window.navigator.userAgent;
	
	if (userAgent.indexOf("MSIE") !== -1 || userAgent.indexOf("Trident") !== -1) {
			return "Internet Explorer";
	} else if (userAgent.indexOf("Edge") !== -1) {
			return "Microsoft Edge";
	} else if (userAgent.indexOf("Firefox") !== -1) {
			return "Mozilla Firefox";
	} else if (userAgent.indexOf("Chrome") !== -1) {
			return "Google Chrome";
	} else if (userAgent.indexOf("Safari") !== -1) {
			return "Apple Safari";
	} else {
			return "Unknown Browser";
	}
}


function checkBrowser() {
	const browserName = getBrowserName();

	if (browserName !== "Internet Explorer") {
			alert("Эта страница правильно отображается только в браузере Internet Explorer. Пожалуйста, используйте его для оптимального просмотра.");
	}
}

window.onload = checkBrowser;
