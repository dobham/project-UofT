let visible = false;
let topnav = false;
function expand() {
    let x = document.getElementById("myTopnav");
    let y = document.getElementById("sideResponsive");
    let z = document.getElementById("blur");
    if (!visible) {
        y.style.visibility = "visible";
        y.style.transform = "translate(0px)";
        z.style.filter = "blur(50px)";
        visible = true;
    } else {
        y.style.visibility = "hidden";
        y.style.transform = "translate(1500px)";
        z.style.filter = "blur(0px)";
        visible = false;
    }
    if (!topnav) {
        x.className += " responsive";
        topnav = true;
    } else {
        x.className = "topnav";
        topnav = false;
    }
}



function searchOverlayOn() {
    var delayInMilliseconds = 50;
    document.getElementById("searchOverlay").style.display = "block";
    setTimeout(function() {
        document.getElementById("searchOverlay").style.opacity = 1;
    }, delayInMilliseconds);

}
function searchOverlayOff() {
    document.getElementById("searchOverlay").style.opacity = 0;
    var delayInMilliseconds = 500;
    setTimeout(function() {
        document.getElementById("searchOverlay").style.display = "none";
    }, delayInMilliseconds);
}

function openSearch() {
    if (document.getElementById("searchBar").style.opacity == 1){
        document.getElementById("searchBar").style.opacity = 0;
        document.getElementById("searchBar").style.width = "50px";
        setTimeout(function() {document.getElementById("searchButton").style.left = "45%";}, 500);

    }
    else{

        setTimeout(function() {
            document.getElementById("searchBar").style.opacity = 1;
            document.getElementById("searchBar").style.width = "450px";}, 100);
        document.getElementById("searchButton").style.left = "33%";
    }
}

function switchLogin(){
    document.getElementById("layerLogin").style.transition = "0.5s cubic-bezier(1, -0.33, 0, 1.38)";
    document.getElementById("layerLogin").style.transform = "translateX(100%)";
    document.getElementById("loginButtonContainer").style.transition = "0.5s cubic-bezier(1, -0.33, 0, 1.38)";
    document.getElementById("loginButtonContainer").style.left = "-4%";
}
function switchSignup(){
    document.getElementById("layerLogin").style.transition = "0.5s cubic-bezier(1, -0.33, 0, 1.38)";
    document.getElementById("layerLogin").style.transform = "translateX(-0%)";
    document.getElementById("loginButtonContainer").style.transition = "0.5s cubic-bezier(1, -0.33, 0, 1.38)";
    document.getElementById("loginButtonContainer").style.left = "4%";
}


var close = true;
function prefOpen(){
    document.getElementById("topPref").style.transition = "0.5s cubic-bezier(1, -0.33, 0, 1.38)";
    console.log(close);
    if(close){
        document.getElementById("topPref").style.right = "0";
        close = false;
        console.log(close);
    }
    else if (!close){
        document.getElementById("topPref").style.right = "-20vw";
        close = true;
    }
}

var close = true;
function prefOpenView(){
    document.getElementById("topPrefView").style.transition = "0.5s cubic-bezier(1, -0.33, 0, 1.38)";
    console.log(close);
    if(close){
        document.getElementById("topPrefView").style.right = "0";
        close = false;
        console.log(close);
    }
    else if (!close){
        document.getElementById("topPrefView").style.right = "-20vw";
        close = true;
    }
}
