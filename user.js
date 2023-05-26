function usernameCheck(user) {
    if (user.length == 0) {
      document.getElementById('unError2').innerText = '';
      return;
    }
    const xHttp = new XMLHttpRequest();
    xHttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('unError2').innerHTML = this.responseText;
        validateForm1();
      }
    };
    xHttp.open('GET', 'validation.php?user=' + user);
    xHttp.send(null);
  }
  
  function emailCheck(email) {
    if (email.length == 0) {
      document.getElementById('emError2').innerText = '';
      return;
    }
    const xHttp = new XMLHttpRequest();
    xHttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('emError2').innerHTML = this.responseText;
        validateForm3();
      }
    };
    xHttp.open('GET', 'validation.php?email=' + email);
    xHttp.send(null);
  }
  
  function passwordCheck(password) {
    if (password.length == 0) {
      document.getElementById('pError2').innerText = '';
      return;
    }
    const xHttp = new XMLHttpRequest();
    xHttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('pError2').innerHTML = this.responseText;
        validateForm2();
      }
    };
    xHttp.open('GET', 'validation.php?password=' + password);
    xHttp.send(null);
  
    confirmPasswordCheck(password, document.getElementById('cPassword').value);
  }
  
  function confirmPasswordCheck(password, confirmPassword) {
    if (confirmPassword.length == 0) {
      document.getElementById('cPError2').innerText = '';
      return;
    }
    const xHttp = new XMLHttpRequest();
    xHttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('cPError2').innerHTML = this.responseText;
        validateForm2();
      }
    };
    xHttp.open("GET", "validation.php?oPassword=" + password + "&cPassword=" + confirmPassword, true);
    xHttp.send(null);
  }
  
  document.addEventListener('DOMContentLoaded', function() {
    validateForm1();
    validateForm2();
    validateForm3();
  });
  
  function validateForm1() {
    const unError2 = document.getElementById('unError2').innerText;
    document.querySelector('.submitButton2').disabled = unError2 !== '';
  }
  
  function validateForm2() {
    const pError2 = document.getElementById('pError2').innerText;
    const cPError2 = document.getElementById('cPError2').innerText;
    document.querySelector('.submitButton3').disabled = pError2 !== '' || cPError2 !== '';
  }
  
  function validateForm3() {
    const emError2 = document.getElementById('emError2').innerText;
    document.querySelector('.submitButton4').disabled = emError2 !== '';
  }
  