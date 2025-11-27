let darkMode = false;

function toggleTheme() {
    if (darkMode) {
        document.body.style.backgroundColor = "white";
        document.body.style.color = "black";
        document.getElementById("themeBtn").innerHTML = "Dark Mode";
    } else {
        document.body.style.backgroundColor="black";
        document.body.style.color = "white";
        document.getElementById("themeBtn").innerHTML = "Light Mode";
    }
    darkMode = !darkMode;
}


function setGreeting() {
    const now = new Date();
    const hour = now.getHours();
    const greeting = document.getElementById("greeting");

    if (hour < 12) {
        greeting.innerHTML = "Good Morning";
    } else if (hour < 18) {
        greeting.innerHTML = "Good Afternoon";
    } else {
        greeting.innerHTML = "Good Evening";
    }
}


setGreeting();

const about = document.getElementById("about");
const projects = document.getElementById("projects");
const contact = document.getElementById("contact");

function showSection(section) {
    about.style.display = "none";
    projects.style.display = "none";
    contact.style.display = "none";

    document.getElementById(section).style.display = "block";
}

const nameTF = document.getElementById("nameTF");
const emailTF = document.getElementById("emailTF");
const msgTF = document.getElementById("msgTF");

const nameERR = document.getElementById("nameERR");
const emailERR = document.getElementById("emailERR");
const msgERR = document.getElementById("msgERR");
const successMSG = document.getElementById("successMSG");

function validateForm() {

    let valid = true;

    if (nameTF.value.trim() === "") {
        nameERR.innerHTML = "Required";
        nameERR.style.color = "red";
        valid = false;
    } else {
        nameERR.innerHTML = "";
    }


    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!emailTF.value.match(emailPattern)) {
        emailERR.innerHTML = "Invalid email";
        emailERR.style.color = "red";
        valid = false;
    } else {
        emailERR.innerHTML = "";
    }


    if (msgTF.value.trim().length < 10) {
        msgERR.innerHTML = "Message too short";
        msgERR.style.color = "red";
        valid = false;
    } else {
        msgERR.innerHTML = "";
    }

    if (valid) {
        successMSG.innerHTML = "Message sent successfully!";
        nameTF.value = "";
        emailTF.value = "";
        msgTF.value = "";
    } else {
        successMSG.innerHTML = "";
    }
}
