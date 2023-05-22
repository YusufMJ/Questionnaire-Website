<?php require("reuse/nav.html");?>

<div class="container text-center d-flex align-items-center justify-content-center">
<div class='primary p-5'>
<h1 class='text-white'>User profile </h1><br>
<form>
<div class="form-group">
<label for='newUsername'class='text-white'> Change username
            <input type="text" class="form-control" id='newUsername' value = 'Ahmed'>
            <input type="submit"class='mt-3 btn btn-outline-light'>
            <hr>
               <label for="password" class='text-white'> New Password</label>
               <input type="password" class="form-control" id="password">
            </div>
            <div class="form-group">
               <label for="cPassword" class='text-white'>Confirm New Password</label>
               <input type="password" class="form-control" id="cPassword">
            
               <input type="submit" class='mt-3 btn btn-outline-light'>
  <hr>            </div>
          <label for="newEmail"class='text-white'> Change Email
          <input type="text" class="form-control" id='newEmail' value='1234@gmail.com'>
          <input type="submit" class='mt-3 btn btn-outline-light'>
          <hr>
          
</div>
</div>
<?php
 require("reuse/end.html");
?>