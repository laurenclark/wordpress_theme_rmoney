"use strict";
document.addEventListener("DOMContentLoaded", function(){
    // Open Hamburger Animation
    document.getElementById('hamburger').onclick = function() {
    var className = ' ' + hamburger.className + ' ';
    var menu = document.querySelector('.menu');
    //If index is truthy
    if ( ~className.indexOf(' open ') ) {
            this.className = className.replace(' open ', ' ');
            menu.style.display = "none"
        } else {
            this.className += ' open';
            menu.style.display = "block";
        }              
    }
});