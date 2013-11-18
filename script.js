var canvas = document.getElementById('canvas');
var g = canvas.getContext('2d');

var halfWidth = canvas.width/2;
var halfHeight = canvas.height/2;

function drawArc(startAngle, endAngle, color) {
    g.fillStyle = color;
    g.beginPath();
    g.moveTo(halfWidth, halfHeight);
    g.arc(halfWidth, halfHeight, halfWidth, startAngle, endAngle);
    g.fill();
}


function showResults(data) {

    g.clearRect(0, 0, canvas.width, canvas.height);
    var colors = Object.keys(data);

    var totalVotes = 0;
    for (var i = 0; i < colors.length; i++) {
        var color = colors[i];
        totalVotes += data[color];
    }
    
    var currentAngle = 0;
    for (var i = 0; i < colors.length; i++) {
        var color = colors[i];
        var votes = data[color];
        var ratio = votes/totalVotes;
        var angle = 2*Math.PI*ratio;
        drawArc(currentAngle, currentAngle + angle, color);
        currentAngle += angle;
    }

    setTimeout(fetchData, 1000);
}


function fetchData() {
    $.getJSON('votes.json', showResults);
}

fetchData();
