<?php require("reuse/nav.html");?>

<div class="container d-flex align-items-center justify-content-center">

   <div class="row primary p-1">

      <div class="col-6 d-none d-md-block">
         <img class="responsiveIMG primary" src="marioPeek.webp" alt="marioPeek">
      </div>


      <div class="col secondary d-flex align-items-center justify-content-center  p-5 p-md-0">
         <form method="post" action="verify.php">
            <h1 class="text-center">LOGIN</h1>
            <div class="form-group">
               <label for="username">Username</label>
               <input type="text" class="form-control" id="user" name="user">
               <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> This could be used for verification error message hmm-->
            </div>
            <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control" id="pass" name="pass">
            </div>
            <!--<div class="form-group form-check">
               <input type="checkbox" class="form-check-input" id="exampleCheck1">
               <label class="form-check-label" for="exampleCheck1">Check me out</label>
               </div> This could be used for something else keep for now -->
            <button type="submit" class="btn btn-outline-dark">Sign in</button>
         </form>
      </div>


   </div>
</div>
<?php require("reuse/end.html");?>