var style = "background-color:#3498db; color:#e74c3c;";
style += "font-size:24pt; font-family:'Times New Roman'";
var shopName = 'Сеть магазинов "ВСЁ ДЛЯ ДОМА"';

var currentDate = new Date();
var dateStr =
  currentDate.getDate() + "." + (currentDate.getMonth() + 1) + "." + currentDate.getFullYear();

document.write('<p align="center" style="' + style + '">' + shopName + '</p>');
document.write('<p align="center">Сегодня ' + dateStr + '</p>');
