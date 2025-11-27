const textBlock = document.getElementById("textBlock");

let fontSize = 16;

function changeBackground() {
    textBlock.style.backgroundColor = "yellow";
}

function increaseFont() {
    fontSize += 2;
    textBlock.style.fontSize = fontSize + "px";
}

function centerText() {
    textBlock.style.textAlign = "center";
}

function resetStyle() {
    fontSize = 16;

    textBlock.style.backgroundColor = "";
    textBlock.style.fontSize = "16px";
    textBlock.style.textAlign = "left";
}
