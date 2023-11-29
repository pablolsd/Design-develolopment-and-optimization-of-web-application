var products = [
  { name: "Товар 1", quantity: 10, price: 20 },
  { name: "Товар 2", quantity: 5, price: 30 }
];

function addProduct() {
  var productName = prompt("Введите название товара:");
  var productQuantity = parseInt(prompt("Введите количество товара:"));
  var productPrice = parseInt(prompt("Введите цену товара:"));

  if (productName && !isNaN(productQuantity) && !isNaN(productPrice)) {
    var newProduct = { name: productName, quantity: productQuantity, price: productPrice };
    products.push(newProduct);
    updateTable();
  } else {
    alert("Введите корректные значения.");
  }
}
