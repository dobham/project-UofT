window.onload = function start() {
    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    var canvas = document.getElementById("canvas");
    if (canvas.getContext) {
        ctx = canvas.getContext("2d");
        window.addEventListener('resize', resizeCanvas, false);
        window.addEventListener('orientationchange', resizeCanvas, false);
        resizeCanvas();
    }
    var spawnLineY = canvas.height;
    var spawnRate = 350;
    var spawnRateOfDescentWhite = -3.50;
    var spawnRateOfDecentGreen = -2.25;
    var lastSpawn = -1;
    var objectsWhite = [];
    var objectsGreen = [];
    var maxSize = 60 * canvas.width;
    var minSize = 15 * canvas.width;
    var startTime = Date.now();
    animate();
    function spawnRandomObjectWhite() {
        var w = "rgb(0,128,128)";
        var object = {
            type: w,
            x: Math.random() * (canvas.width - 30) + 15,
            y: spawnLineY,
            width: ((maxSize * Math.random()) + minSize) /1500,
            height: ((maxSize * Math.random()) + minSize) /1500
        };
        objectsWhite.push(object);
    }
    function spawnRandomObjectGreen(){
        var g = "rgb(64,224,128)";
        var object = {
            type: g,
            x: Math.random() * (canvas.width - 30) + 15,
            y: spawnLineY,
            width: ((maxSize * Math.random()) + minSize) /1500,
            height: ((maxSize * Math.random()) + minSize) /1500
        };
        objectsGreen.push(object);
    }
    function animate() {
        var time = Date.now();
        if (time > (lastSpawn + spawnRate)) {
            lastSpawn = time;
            spawnRandomObjectGreen();
            spawnRandomObjectWhite();
        }
        requestAnimationFrame(animate);
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.beginPath();
        ctx.moveTo(0, spawnLineY);
        ctx.lineTo(canvas.width, spawnLineY);
        ctx.stroke();
        for (var i = 0; i < objectsWhite.length; i++) {
            var object = objectsWhite[i];
            object.y += spawnRateOfDescentWhite;
            ctx.beginPath();
            ctx.fillRect(object.x, object.y, object.width, object.height);
            ctx.closePath();
            ctx.fillStyle = object.type;
            ctx.fill();
        }
        for (var g = 0; g < objectsGreen.length; g++){
            var object = objectsGreen[g];
            object.y += spawnRateOfDecentGreen;
            ctx.beginPath();
            ctx.fillRect(object.x, object.y, object.width, object.height);
            ctx.closePath();
            ctx.fillStyle = object.type;
            ctx.fill();
        }
    }
}