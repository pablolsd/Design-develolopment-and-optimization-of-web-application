var container = document.getElementById('container');
var trail = document.getElementById('trail');
var radius = 100;
var centerX = window.innerWidth / 2;
var centerY = window.innerHeight / 2;
var angle = 0;
var rotationCount = 0;

function updatePosition() {
    var x = centerX + radius * Math.cos(angle);
    var y = centerY + radius * Math.sin(angle);

    container.style.left = x + 'px';
    container.style.top = y + 'px';

    createTrailPair(x, y);

    angle += 0.01;

    if (angle >= 2 * Math.PI) {
        angle = 0;
        rotationCount++;
        container.style.backgroundColor = generateRandomColor();
    }

    requestAnimationFrame(updatePosition);
}

function createTrailPair(x, y) {
    var trailDot1 = createTrailDot(x, y);
    angle += 0.01;
    var x2 = centerX + radius * Math.cos(angle);
    var y2 = centerY + radius * Math.sin(angle);
    var trailDot2 = createTrailDot(x2, y2);

    var trailLine = document.createElement('div');
    trailLine.className = 'trail-line';
    trailLine.style.left = (x + x2) / 2 + 'px';
    trailLine.style.top = (y + y2) / 2 + 15 + 'px';
    trailLine.style.width = distanceBetweenPoints(x, y, x2, y2) + 'px';
    trailLine.style.transform = 'rotate(' + calculateAngle(x, y, x2, y2) + 'rad)';
    trail.appendChild(trailLine);

    
    setTimeout(function() {
        trail.removeChild(trailDot1);
        trail.removeChild(trailDot2);
        trail.removeChild(trailLine);
    }, 200);
}

function createTrailDot(x, y) {
    var trailDot = document.createElement('div');
    trailDot.className = 'trail-dot';
    trailDot.style.left = x + 'px';
    trailDot.style.top = y + 'px';
    trail.appendChild(trailDot);
    return trailDot;
}

function distanceBetweenPoints(x1, y1, x2, y2) {
    return Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));
}

function calculateAngle(x1, y1, x2, y2) {
    return Math.atan2(y2 - y1, x2 - x1);
}

function generateRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

window.onload = function() {
    updatePosition();
};
