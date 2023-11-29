function updateTable() {
  var tableBody = document.getElementById('inventoryTable').getElementsByTagName('tbody')[0];
  tableBody.innerHTML = "";

  for (var i = 0; i < products.length; i++) {
    var row = tableBody.insertRow(i);

    var nameCell = row.insertCell(0);
    var quantityCell = row.insertCell(1);
    var priceCell = row.insertCell(2);
    var totalCell = row.insertCell(3);

    nameCell.textContent = products[i].name;
    quantityCell.innerHTML = '<input type="number" value="' + products[i].quantity + '" class="quantityInput" />';
    priceCell.innerHTML = '<input type="number" value="' + products[i].price + '" class="priceInput" />';
    
    var total = products[i].quantity * products[i].price;
    totalCell.textContent = total;
  }

  updateTotal();
}


document.getElementById('inventoryTable').addEventListener('input', function (e) {
  if (e.target.classList.contains('quantityInput') || e.target.classList.contains('priceInput')) {
    updateTotal();
  }
});


function updateTotal() {
  var rows = document.getElementById('inventoryTable').rows;
  var totalPrice = 0;

  for (var i = 0; i < rows.length; i++) {
    var quantity = parseInt(rows[i].querySelector('.quantityInput').value);
    var price = parseInt(rows[i].querySelector('.priceInput').value);
    var total = quantity * price;
    rows[i].cells[3].textContent = total;
    totalPrice += total;
  }

  document.getElementById('totalPrice').textContent = totalPrice;
}


updateTable();
