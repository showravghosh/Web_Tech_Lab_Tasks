function updateClock() {

    let now = new Date();

    let hours = now.getHours();
    let minutes = now.getMinutes();
    let seconds = now.getSeconds();

    let ampm = "AM";

    if (hours >= 12) {
        ampm = "PM";
    }

    if (hours === 0) {
        hours = 12;
    } else if (hours > 12) {
        hours = hours - 12;
    }

    hours = hours.toString().padStart(2, "0");
    minutes = minutes.toString().padStart(2, "0");
    seconds = seconds.toString().padStart(2, "0");

    document.getElementById("clock").innerHTML = hours + ":" + minutes + ":" + seconds + " " + ampm;
    
}

setInterval(updateClock, 1000);
updateClock();
