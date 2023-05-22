function usernameCheck(user){
    if (user.length == 0){
        document.getElementById('unError').innerText="";
        return;
    }
    const xHttp = new XMLHttpRequest();
    xHttp.onreadystatechange = function(){
        if (this.readyState==4 && this.status== 200){
            document.getElementById('unError').innerHTML = this.responseText;
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
        }
    };
    xHttp.open("GET", "validation.php?oPassword=" + password + "&cPassword=" + confirmPassword);
    xHttp.send(null);
}