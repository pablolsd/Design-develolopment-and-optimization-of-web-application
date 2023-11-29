function drawEllipse() {
  var majorAxis = document.getElementById('majorAxis').value;
  var minorAxis = document.getElementById('minorAxis').value;

  if (majorAxis && minorAxis) {
    var ellipse = document.getElementById('ellipse');
    ellipse.style.width = majorAxis + 'px';
    ellipse.style.height = minorAxis + 'px';

    var centerX = window.innerWidth / 2;
    var centerY = window.innerHeight / 2;

    ellipse.style.left = centerX - majorAxis / 2 + 'px';
    ellipse.style.top = centerY - minorAxis / 2 + 'px';
  } else {
    alert('Пожалуйста, введите значения обеих полуосей.');
  }
}
