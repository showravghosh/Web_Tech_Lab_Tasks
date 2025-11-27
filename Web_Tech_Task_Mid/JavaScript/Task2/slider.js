const mainIMG=document.getElementById("mainIMG");
const prevBTN=document.getElementById("prevBTN");
const nextBTN=document.getElementById("nextBTN");


const images=[
    "travel1.png",
    "travel2.jpg",
    "travel3.jpg",
    "travel4.webp"
];

let index=0;

mainIMG.src=images[index];


nextBTN.addEventListener("click", function(){

    index++;

    if(index >= images.length)
    {
        index = 0;
    }

    mainIMG.src = images[index];

});



prevBTN.addEventListener("click", function(){

    index--;

    if(index < 0)
    {
        index = images.length - 1;
    }

    mainIMG.src = images[index];

});



setInterval(function(){

    index++;

    if(index >= images.length)
    {
        index = 0;
    }

    mainIMG.src = images[index];

}, 3000);
