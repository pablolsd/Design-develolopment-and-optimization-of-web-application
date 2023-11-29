var countries = {
	1: "Страна 1",
	2: "Страна 2"
};

var regions = {
	1: ["Регион 1.1", "Регион 1.2"],
	2: ["Регион 2.1", "Регион 2.2"]
};

var cities = {
	1: {
			"Регион 1.1": ["Город 1.1.1", "Город 1.1.2"],
			"Регион 1.2": ["Город 1.2.1", "Город 1.2.2"]
	},
	2: {
			"Регион 2.1": ["Город 2.1.1", "Город 2.1.2"],
			"Регион 2.2": ["Город 2.2.1", "Город 2.2.2"]
	}
};

$.each(countries, function(key, value) {
	$('#country').append($("<option></option>").attr("value", key).text(value));
});

function fetchRegions() {
	var countryId = $("#country").val();
	var regionDropdown = $("#region");
	regionDropdown.empty();

	if (countryId in regions) {
			$.each(regions[countryId], function(index, value) {
					regionDropdown.append($("<option></option>").attr("value", value).text(value));
			});
	}

	$("#city").html('<option value="">Выберите город</option>');
}

function fetchCities() {
	var countryId = $("#country").val();
	var regionName = $("#region").val();
	var cityDropdown = $("#city");
	cityDropdown.empty();

	if (countryId in cities && regionName in cities[countryId]) {
			$.each(cities[countryId][regionName], function(index, value) {
					cityDropdown.append($("<option></option>").attr("value", value).text(value));
			});
	}
}
