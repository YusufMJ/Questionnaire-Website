


function usernameCheck(user){
    if (user.length == 0){
        document.getElementById('unError2').innerText="";
        return;
    }
    const xHttp = new XMLHttpRequest();
    xHttp.onreadystatechange = function(){
        if (this.readyState==4 && this.status== 200){
            document.getElementById('unError2').innerHTML = this.responseText;
            validateForm();
        }
    };
    xHttp.open("GET","validation.php?user="+user)
    xHttp.send(null);
}

function emailCheck(email){
    if (email.length == 0){
        document.getElementById('emError2').innerText="";
        return;
    }
    const xHttp = new XMLHttpRequest();
    xHttp.onreadystatechange = function(){
        if (this.readyState==4 && this.status== 200){
            document.getElementById('emError2').innerHTML = this.responseText;
            validateForm();
        }
    };
    xHttp.open("GET","validation.php?email="+email)
    xHttp.send(null);
    
}

function passwordCheck(password){
    if (password.length == 0){
        document.getElementById('pError2').innerText="";
        return;
    }
    const xHttp = new XMLHttpRequest();
    xHttp.onreadystatechange = function(){
        if (this.readyState==4 && this.status== 200){
            document.getElementById('pError2').innerHTML = this.responseText;
            validateForm();
        }
    };
    xHttp.open("GET","validation.php?password="+password)
    xHttp.send(null);
    
    confirmPasswordCheck(password, document.getElementById('cPassword').value);
    
}


function confirmPasswordCheck(password, confirmPassword) {
    if (confirmPassword.length == 0) {
        document.getElementById('cPError2').innerText = "";
        return;
    }
    const xHttp = new XMLHttpRequest();
    xHttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('cPError2').innerHTML = this.responseText;
            validateForm();
        }
    };
    xHttp.open("GET", "validation.php?oPassword=" + password + "&cPassword=" + confirmPassword);
    xHttp.send(null);
    
}


function validateForm() {
    const username = document.getElementById('newUsername').value;
    const email = document.getElementById('newEmail').value;
    const password = document.getElementById('newpassword').value;
    const cPassword = document.getElementById('cnewPassword').value;

    const unError2 = document.getElementById('unError2').innerText;
    const emError2 = document.getElementById('emError2').innerText;
    const pError2 = document.getElementById('pError2').innerText;
    const cPError2 = document.getElementById('cPError2').innerText;

    if (username !== '' && email !== '' && password !== '' && cPassword !== '' &&
        unError2 === '' && emError2 === '' && pError2 === '' && cPError2 === '') {
        document.getElementById('submitButton2').disabled = false;
    } else {
        document.getElementById('submitButton2').disabled = true;
    }
}

function handleSubmit(event) {
    if (document.getElementById('submitButton2').disabled) {
        event.preventDefault();
        alert("You have to fill all the information first");
    } else {
        
    }
}

// Add the event listener to the form submit event instead of the button click event
document.getElementById('userForm').addEventListener('submit', handleSubmit);