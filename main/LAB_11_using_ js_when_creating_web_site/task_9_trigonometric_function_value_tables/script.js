function generateTable() {
	const selectedFunction = document.getElementById("function").value;
	const start = parseFloat(document.getElementById("start").value);
	const end = parseFloat(document.getElementById("end").value);
	const step = parseFloat(document.getElementById("step").value);

	if (isNaN(start) || isNaN(end) || isNaN(step)) {
			alert("Please enter valid numeric values for start, end, and step.");
			return;
	}

	const table = document.getElementById("resultTable");
	
	while (table.firstChild) {
			table.removeChild(table.firstChild);
	}

	const headerRow = document.createElement("tr");
	headerRow.innerHTML = "<th>Angle (degrees)</th><th>Angle (radians)</th><th>sin</th><th>cos</th><th>tan</th>";
	table.appendChild(headerRow);

	for (let angle = start; angle <= end; angle += step) {
			const radians = (angle * Math.PI) / 180;
			const resultSin = calculateResult("sin", radians);
			const resultCos = calculateResult("cos", radians);
			const resultTan = calculateResult("tan", radians);

			const row = document.createElement("tr");
			const angleDegreesCell = document.createElement("td");
			angleDegreesCell.textContent = angle.toFixed(2);
			const angleRadiansCell = document.createElement("td");
			angleRadiansCell.textContent = radians.toFixed(4);
			const sinCell = document.createElement("td");
			sinCell.textContent = resultSin.toFixed(4);
			const cosCell = document.createElement("td");
			cosCell.textContent = resultCos.toFixed(4);
			const tanCell = document.createElement("td");
			tanCell.textContent = resultTan.toFixed(4);

			row.appendChild(angleDegreesCell);
			row.appendChild(angleRadiansCell);
			row.appendChild(sinCell);
			row.appendChild(cosCell);
			row.appendChild(tanCell);

			table.appendChild(row);
	}

	document.getElementById("inputPage").style.display = "none";
	document.getElementById("outputPage").style.display = "block";
}

function calculateResult(func, angle) {
	switch (func) {
			case "sin":
					return Math.sin(angle);
			case "cos":
					return Math.cos(angle);
			case "tan":
					return Math.tan(angle);
			default:
					return NaN;
	}
}

function goBack() {
	document.getElementById("inputPage").style.display = "block";
	document.getElementById("outputPage").style.display = "none";
}
