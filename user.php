<?php require('reuse/enforce.php'); ?>
<?php require('reuse/nav.html'); ?>

<div class="container text-center d-flex align-items-center justify-content-center">
  <div class="primary p-5">
    <h1 class="text-white">User profile</h1><br>

    <div class="form-group form1">
      <form method="post" action="userVerify.php">
        <label for="newUsername" class="text-white">Change username</label>
        <input type="text" class="form-control" id="newUsername" name="newUN" onkeyup="usernameCheck(this.value); ">
        <small id="unError2" class="form-text errorMessage">Please enter Username</small>
        <div class="mt-3">
          <input type="submit" class="btn btn-outline-light submitButton2">
        </div>
      </form>
    </div>
    <hr>

    <div class="form-group form2">
      <form method="post" action="userVerify.php">
        <label for="password" class="text-white">New Password</label>
        <input type="password" class="form-control" id="password" name="newP" onkeyup="passwordCheck(this.value); ">
        <label for="cPassword" class="text-white">Confirm New Password</label>
        <input type="password" class="form-control" id="cPassword" name="cnewP" onkeyup="confirmPasswordCheck(document.getElementById('password').value, this.value); ">
        <small id="pError2" class="form-text errorMessage">Please enter Password</small>
        <small id="cPError2" class="form-text errorMessage">~</small>
        <div class="mt-3">
          <input type="submit" class="btn btn-outline-light submitButton3 ">
        </div>
      </form>
    </div>
    <hr>

    <div class="form-group form3">
      <form method="post" action="userVerify.php">
        <label for="newEmail" class="text-white">Change Email</label>
        <input type="text" class="form-control" id="newEmail" name="newEmail" onkeyup="emailCheck(this.value); ">
        <small id="emError2" class="form-text errorMessage">Please enter Email</small>
        <div class="mt-3">
          <input type="submit" class="btn btn-outline-light submitButton4 ">
        </div>
      </form>
    </div>
    <hr>
  </div>
</div>

<script src="user.js"></script>
<?php require('reuse/end.html'); ?>