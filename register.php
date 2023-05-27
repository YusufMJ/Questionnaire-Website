<?php require("reuse/nav.html");?>

<div class="container d-flex align-items-center justify-content-center">

   <div class="row primary p-1">

      <div class="col-6 d-none d-md-block">
         <img class="responsiveIMG primary" src="marioPeek.webp" alt="marioPeek">
      </div>


      <div class="col secondary d-flex align-items-center justify-content-center  p-5 p-md-0">
         <form class="registerForm" method="post" action="signupVerify.php">
            <h1 class="text-center">REGISTER</h1>
            <div class="form-group">
               <label for="username">Username</label>
               <input type="text" class="form-control" id="username" onkeyup="usernameCheck(this.value);" name="user">
               <small id="unError" class="form-text errorMessage"></small>
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="text" class="form-control" id="email" onkeyup="emailCheck(this.value);" name="em">
               <small id="emError" class="form-text errorMessage"></small>
            </div>
            <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control" id="password" onkeyup="passwordCheck(this.value);" name="pass">
               <small id="pError" class="form-text errorMessage"></small>
            </div>
            <div class="form-group">
               <label for="cPassword">Confirm Password</label>
               <input type="password" class="form-control" id="cPassword" onkeyup="confirmPasswordCheck(document.getElementById('password').value, this.value);" name="cPass">
               <small id="cPError" class="form-text errorMessage"></small>
            </div>
            <!--<div class="form-group form-check">
               <input type="checkbox" class="form-check-input" id="exampleCheck1">
               <label class="form-check-label" for="exampleCheck1">Check me out</label>
               </div> This could be used for something else keep for now -->
            <button type="submit" class="btn btn-outline-dark" id="submitButton" disabled>Sign up</button>
         </form>
      </div>


   </div>
</div>
<script src="register.js"></script>
<?php require("reuse/end.html");?>