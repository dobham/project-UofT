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
function searchOverlayOn() {
    document.getElementById("searchOverlay").style.display = "block";
}
function searchOverlayOff() {
    document.getElementById("searchOverlay").style.display = "none";
}
function openSearch() {
    if (document.getElementById("searchBar").style.opacity == 1){
        document.getElementById("searchBar").style.opacity = 0;
        document.getElementById("searchBar").style.width = "50px";
        document.getElementById("searchButton").style.left = "45%";
    }
    else{
        document.getElementById("searchBar").style.opacity = 1;
        document.getElementById("searchButton").style.left = "33%";
        if (document.getElementById("searchBar").style.opacity == 1){
            document.getElementById("searchBar").style.width = "450px";
        }
    }
}
/*function closeSearch() {
    document.getElementById("searchBar").style.display = "none";
}*/