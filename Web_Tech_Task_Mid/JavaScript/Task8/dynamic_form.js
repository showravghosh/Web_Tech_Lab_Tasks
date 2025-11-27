const userType = document.getElementById("userType");
const rollDiv = document.getElementById("rollDiv");
const deptDiv = document.getElementById("deptDiv");

function showFields() {
    if (userType.value === "student") {
        rollDiv.style.display = "block";
        deptDiv.style.display = "none";
    } 
    else if (userType.value === "teacher") {
        deptDiv.style.display = "block";
        rollDiv.style.display = "none";
    } 
    else {
        rollDiv.style.display = "none";
        deptDiv.style.display = "none";
    }
}
