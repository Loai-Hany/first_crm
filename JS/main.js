var btnToUp = document.getElementById("btnToUp");
var myMoon = document.getElementById("myMoon");
var row = document.getElementById("row");

window.onscroll = function () {
    if (window.scrollY > 600) {
        btnToUp.style.cssText = "display: block";
    } else {
        btnToUp.style.cssText = "display: none";
    }
} 

btnToUp.addEventListener("click" , function () {
    window.scrollTo({
        left: 0,
        top: 0,
        behavior: "smooth"
    });
});

myMoon.addEventListener("click" , function() {
    document.body.classList.toggle("dark-theme");
    row.classList.toggle("row-theme");
    myMoon.classList.toggle("moon-theme");

    if(localStorage.getItem("theme") == "light")
        localStorage.setItem("theme","dark");
    else
        localStorage.setItem("theme","light");  
});

function checkTheme() { 
    if(localStorage.getItem("theme") == "light") {
        document.body.classList.remove("dark-theme");
        row.classList.remove("row-theme");
        myMoon.classList.remove("moon-theme");

   } else if (localStorage.getItem("theme") == "dark") {
        document.body.classList.add("dark-theme");
        row.classList.add("row-theme");
        myMoon.classList.add("moon-theme");

   } else {
     localStorage.setItem("theme" , "light");
   }
 }
 
 checkTheme();

 