const fullnameTF=document.getElementById("fullnameTF");
const emailTF=document.getElementById("emailTF");
const passwordTF=document.getElementById("passwordTF");
const confirmTF=document.getElementById("confirmTF");
const phoneTF=document.getElementById("phoneTF");

const fullnameERR=document.getElementById("fullnameERR");
const emailERR=document.getElementById("emailERR");
const passwordERR=document.getElementById("passwordERR");
const confirmERR=document.getElementById("confirmERR");
const phoneERR=document.getElementById("phoneERR");

const successMSG=document.getElementById("successMSG");

const emailRegex=/\S+@\S+\.\S+/;

function formValidate()
{
    let hasERR=false;

    fullnameERR.innerHTML="";
    emailERR.innerHTML="";
    passwordERR.innerHTML="";
    confirmERR.innerHTML="";
    phoneERR.innerHTML="";
    successMSG.innerHTML="";



    if(fullnameTF.value.trim()==="")
    {
        hasERR=true;
        fullnameERR.innerHTML="Name cannot be empty";
        fullnameERR.style.color="red";
    }

    
    if(emailTF.value.trim()==="")
    {
        hasERR=true;
        emailERR.innerHTML="Email cannot be empty";
        emailERR.style.color="red";
    }
    else
    {
        if(!emailRegex.test(emailTF.value))
        {
            hasERR=true;
            emailERR.innerHTML="Email pattern did not match";
            emailERR.style.color="red";
        }
    }


    if(passwordTF.value.trim()==="")
    {
        hasERR=true;
        passwordERR.innerHTML="Password cannot be empty";
        passwordERR.style.color="red";
    }
    else
    {
        if(passwordTF.value.length < 6)
        {
            hasERR=true;
            passwordERR.innerHTML="Password must be at least 6 characters";
            passwordERR.style.color="red";
        }
    }


    if(confirmTF.value.trim()==="")
    {
        hasERR=true;
        confirmERR.innerHTML="Confirm Password cannot be empty";
        confirmERR.style.color="red";
    }
    else
    {
        if(passwordTF.value !== confirmTF.value)
        {
            hasERR=true;
            confirmERR.innerHTML="Confirm Passwords do not match";
            confirmERR.style.color="red";
        }
    }



    if(phoneTF.value.trim()==="")
    {
        hasERR=true;
        phoneERR.innerHTML="Phone number cannot be empty";
        phoneERR.style.color="red";
    }
    else
    {
        if(isNaN(phoneTF.value))
        {
            hasERR=true;
            phoneERR.innerHTML="Phone number must contain only digits";
            phoneERR.style.color="red";
        }
    }

    if(hasERR)
    {
        return false;
    }
    else
    {
        successMSG.innerHTML="Registration Successful!";
        successMSG.style.color="green";
        return false;
    }
}
