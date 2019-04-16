/**
 * Author: Adrian Taylor
 * Date: 2/19/2019
 * Course: Web Dev 262
 * Project: Travel Website
 * Didn't want a place so I used a earth animation. Also creating a mouseover the images.
 */

var earth = document.getElementById('earth');
var moveForward = true;
var earthTimer = setInterval(earthMove, 5);

function earthMove() {
    if (earth.offsetLeft >= document.body.offsetWidth - earth.offsetWidth) {
        walkForward = false;
    }

    if (earth.offsetLeft <= 0) {
        walkForward = true;
    }

    if (walkForward) {

        earth.style.transform = "scaleX(1)";
        earth.style.left = earth.offsetLeft + 1 + "px";
    } else {

        earth.style.transform = "scaleX(-1)";

        earth.style.left = earth.offsetLeft - 1 + "px";
    }
}


var d = new Date();
var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

var date = document.getElementById("date");


function getDate() {
    date.innerHTML = monthNames[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
}



getDate();