function expand() {
    let x = document.getElementById("myTopnav");
    let y = document.getElementById("sideResponsive");
    if (y.style.visibility === "hidden") {
        y.style.visibility = "visible";
        y.style.transform = "translate(0px)";
    } else {
        y.style.visibility = "hidden";
        y.style.transform = "translate(1500px)";
    }
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}