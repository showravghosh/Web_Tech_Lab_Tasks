const box=document.getElementById("box");
const headerSec=document.getElementById("headerSec");
const contentSec=document.getElementById("contentSec");
const footerSec=document.getElementById("footerSec");
const toggleBTN=document.getElementById("toggleBTN");

let darkMode=false;


box.style.border="3px solid green";
box.style.padding="20px";
box.style.width="400px";

function applyLightMode()
{
    box.style.backgroundColor="white";
    headerSec.style.color="black";
    contentSec.style.color="black";
    footerSec.style.color="black";

    toggleBTN.innerText="Switch to Dark Mode";
}

function applyDarkMode()
{
    box.style.backgroundColor="black";
    headerSec.style.color="white";
    contentSec.style.color="white";
    footerSec.style.color="white";

    toggleBTN.innerText="Switch to Light Mode";
}


toggleBTN.addEventListener("click", function(){

    if(darkMode===false)
    {
        darkMode=true;
        applyDarkMode();
    }
    else
    {
        darkMode=false;
        applyLightMode();
    }

});
