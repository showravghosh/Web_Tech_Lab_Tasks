const nameTF=document.getElementById("nameTF");
const rollTF=document.getElementById("rollTF");
const deptTF=document.getElementById("deptTF");

const nameERR=document.getElementById("nameERR");
const rollERR=document.getElementById("rollERR");
const deptERR=document.getElementById("deptERR");

const addBTN=document.getElementById("addBTN");
const studentTable=document.getElementById("studentTable");

addBTN.addEventListener("click", function(){

    let hasERR=false;

    nameERR.innerHTML="";
    rollERR.innerHTML="";
    deptERR.innerHTML="";


    if(nameTF.value.trim()===""){

        hasERR=true;
        nameERR.innerHTML="name cannot be empty";
        nameERR.style.color="red";
    }

    if(rollTF.value.trim()===""){

        hasERR=true;
        rollERR.innerHTML="roll cannot be empty";
        rollERR.style.color="red";
    }

    if(deptTF.value.trim()===""){

        hasERR=true;
        deptERR.innerHTML="department cannot be empty";
        deptERR.style.color="red";
    }

    if(hasERR){
        return;
    }

    const row=document.createElement("tr");

    const nameTD=document.createElement("td");
    nameTD.innerText=nameTF.value;

    const rollTD=document.createElement("td");
    rollTD.innerText=rollTF.value;

    const deptTD=document.createElement("td");
    deptTD.innerText=deptTF.value;

    const actionTD=document.createElement("td");
    const delBTN=document.createElement("button");
    delBTN.innerText="Delete";


    delBTN.addEventListener("click", function(){

        studentTable.removeChild(row);
    });

    actionTD.appendChild(delBTN);

    row.appendChild(nameTD);
    row.appendChild(rollTD);
    row.appendChild(deptTD);
    row.appendChild(actionTD);

    studentTable.appendChild(row);

    nameTF.value="";
    rollTF.value="";
    deptTF.value="";

});
