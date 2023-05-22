


function usernameCheck(user){
    if (user.length == 0){
        document.getElementById('unError').innerText="";
        return;
    }
    const xHttp = new XMLHttpRequest();
    xHttp.onreadystatechange = function(){
        if (this.readyState==4 && this.status== 200){
            document.getElementById('unError').innerHTML = this.responseText;
            validateForm();
        }
    };
    xHttp.open("GET","validation.php?user="+user)
    xHttp.send(null);
}

function emailCheck(email){
    if (email.length == 0){
        document.getElementById('emError').innerText="";
        return;
    }
    const xHttp = new XMLHttpRequest();
    xHttp.onreadystatechange = function(){
        if (this.readyState==4 && this.status== 200){
            document.getElementById('emError').innerHTML = this.responseText;
            validateForm();
        }
    };
    xHttp.open("GET","validation.php?email="+email)
    xHttp.send(null);
    
}

function passwordCheck(password){
    if (password.length == 0){
        document.getElementById('pError').innerText="";
        return;
    }
    const xHttp = new XMLHttpRequest();
    xHttp.onreadystatechange = function(){
        if (this.readyState==4 && this.status== 200){
            document.getElementById('pError').innerHTML = this.responseText;
            validateForm();
        }
    };
    xHttp.open("GET","validation.php?password="+password)
    xHttp.send(null);
    
    confirmPasswordCheck(password, document.getElementById('cPassword').value);
    
}


function confirmPasswordCheck(password, confirmPassword) {
    if (confirmPassword.length == 0) {
        document.getElementById('cPError').innerText = "";
        return;
    }
    const xHttp = new XMLHttpRequest();
    xHttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('cPError').innerHTML = this.responseText;
            validateForm();
        }
    };
    xHttp.open("GET", "validation.php?oPassword=" + password + "&cPassword=" + confirmPassword);
    xHttp.send(null);
    
}


function validateForm() {
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const cPassword = document.getElementById('cPassword').value;

    const unError = document.getElementById('unError').innerText;
    const emError = document.getElementById('emError').innerText;
    const pError = document.getElementById('pError').innerText;
    const cPError = document.getElementById('cPError').innerText;

    if (username !== '' && email !== '' && password !== '' && cPassword !== '' &&
        unError === '' && emError === '' && pError === '' && cPError === '') {
        document.getElementById('submitButton').disabled = false;
    } else {
        document.getElementById('submitButton').disabled = true;
    }
}

function handleSubmit(event) {
    if (document.getElementById('submitButton').disabled) {
        event.preventDefault();
        alert("You have to fill all the information first");
    } else {
        
    }
}

// Add the event listener to the form submit event instead of the button click event
document.getElementById('registerForm').addEventListener('submit', handleSubmit);