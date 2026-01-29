<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Contact Us</h2>
    <form id="contactForm">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <small id="nameError"></small>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <small id="emailError"></small>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" placeholder="xxx-xxx-xxxx">
        <small id="phoneError"></small>

        <label for="subject">Subject:</label>
        <select id="subject" name="subject">
            <option value="">Select a subject</option>
            <option value="General Inquiry">General Inquiry</option>
            <option value="Support">Support</option>
            <option value="Feedback">Feedback</option>
        </select>
        <small id="subjectError"></small>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5"></textarea>
        <small id="messageError"></small>

        <div id="loading">Submitting...</div>
        <button type="submit" id="submitBtn" disabled>Submit</button>
    </form>
    <div class="success-message" id="successMessage"></div>
</div>

<script>
const contactForm = document.getElementById('contactForm');
const submitBtn = document.getElementById('submitBtn');
const loading = document.getElementById('loading');
const successMessage = document.getElementById('successMessage');

const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const phoneInput = document.getElementById('phone');
const subjectInput = document.getElementById('subject');
const messageInput = document.getElementById('message');

const nameError = document.getElementById('nameError');
const emailError = document.getElementById('emailError');
const phoneError = document.getElementById('phoneError');
const subjectError = document.getElementById('subjectError');
const messageError = document.getElementById('messageError');

let validFields = {
    name: false,
    email: false,
    phone: false,
    subject: false,
    message: false
};

function validateName() {
    const val = nameInput.value.trim();
    const regex = /^[A-Za-z ]{3,}$/;
    if (regex.test(val)) {
        nameInput.classList.add('valid');
        nameInput.classList.remove('invalid');
        nameError.textContent = '';
        validFields.name = true;
    } else {
        nameInput.classList.add('invalid');
        nameInput.classList.remove('valid');
        nameError.textContent = 'Name must be at least 3 letters';
        validFields.name = false;
    }
    checkFormValidity();
}

function validateEmail() {
    const val = emailInput.value.trim();
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regex.test(val)) {
        emailInput.classList.add('invalid');
        emailInput.classList.remove('valid');
        emailError.textContent = 'Invalid email format';
        validFields.email = false;
        checkFormValidity();
        return;
    }
    emailError.textContent = '';
    // AJAX call to validate email availability
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `validate_email.php?email=${encodeURIComponent(val)}`, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                try {
                    const res = JSON.parse(xhr.responseText);
                    if (res.available) {
                        emailInput.classList.add('valid');
                        emailInput.classList.remove('invalid');
                        emailError.textContent = '';
                        validFields.email = true;
                    } else {
                        emailInput.classList.add('invalid');
                        emailInput.classList.remove('valid');
                        emailError.textContent = 'Email already exists';
                        validFields.email = false;
                    }
                } catch(e) {
                    emailError.textContent = 'Error checking email';
                    validFields.email = false;
                }
            }
            checkFormValidity();
        }
    };
    xhr.send();
}

function validatePhone() {
    const val = phoneInput.value.trim();
    const regex = /^\d{3}-\d{3}-\d{4}$/;
    if (regex.test(val)) {
        phoneInput.classList.add('valid');
        phoneInput.classList.remove('invalid');
        phoneError.textContent = '';
        validFields.phone = true;
    } else {
        phoneInput.classList.add('invalid');
        phoneInput.classList.remove('valid');
        phoneError.textContent = 'Phone must be xxx-xxx-xxxx';
        validFields.phone = false;
    }
    checkFormValidity();
}

function validateSubject() {
    if (subjectInput.value !== '') {
        subjectInput.classList.add('valid');
        subjectInput.classList.remove('invalid');
        subjectError.textContent = '';
        validFields.subject = true;
    } else {
        subjectInput.classList.add('invalid');
        subjectInput.classList.remove('valid');
        subjectError.textContent = 'Please select a subject';
        validFields.subject = false;
    }
    checkFormValidity();
}

function validateMessage() {
    const val = messageInput.value.trim();
    if (val.length >= 20) {
        messageInput.classList.add('valid');
        messageInput.classList.remove('invalid');
        messageError.textContent = '';
        validFields.message = true;
    } else {
        messageInput.classList.add('invalid');
        messageInput.classList.remove('valid');
        messageError.textContent = 'Message must be at least 20 characters';
        validFields.message = false;
    }
    checkFormValidity();
}

function checkFormValidity() {
    submitBtn.disabled = !Object.values(validFields).every(v => v === true);
}

nameInput.addEventListener('input', validateName);
emailInput.addEventListener('blur', validateEmail);
phoneInput.addEventListener('input', validatePhone);
subjectInput.addEventListener('change', validateSubject);
messageInput.addEventListener('input', validateMessage);

contactForm.addEventListener('submit', function(e){
    e.preventDefault();
    loading.style.display = 'block';
    submitBtn.disabled = true;

    const data = {
        name: nameInput.value.trim(),
        email: emailInput.value.trim(),
        phone: phoneInput.value.trim(),
        subject: subjectInput.value,
        message: messageInput.value.trim()
    };

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit_form.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.timeout = 5000;
    xhr.ontimeout = function() {
        loading.style.display = 'none';
        alert('Request timed out!');
        submitBtn.disabled = false;
    };

    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4){
            loading.style.display = 'none';
            if(xhr.status === 200){
                try{
                    const res = JSON.parse(xhr.responseText);
                    if(res.success){
                        successMessage.textContent = `Form submitted successfully! Reference: ${res.ref}`;
                        successMessage.style.display = 'block';
                        contactForm.reset();
                        Object.keys(validFields).forEach(k => validFields[k]=false);
                        submitBtn.disabled = true;
                        document.querySelectorAll('input, select, textarea').forEach(el=>{
                            el.classList.remove('valid');
                        });
                    } else {
                        alert('Error: '+res.message);
                    }
                }catch(e){
                    alert('Error parsing server response');
                }
            }else{
                alert('Server error');
            }
        }
    };
    xhr.send(JSON.stringify(data));
});
</script>
</body>
</html>
