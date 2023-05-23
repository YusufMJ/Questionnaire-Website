<?php require('reuse/enforce.php');?>
<?php require("reuse/nav.html");?>

<?php
if(isset($_POST['newUN'])){
    require('connection.php');
    $username = cleanInput($_POST['newUN']);
    $unPattern = '/^[A-Za-z0-9]{3,15}$/';
    $email = cleanInput($_POST['newEmail']);
    $emPattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,5}$/';
    $password = cleanInput($_POST['newP']);
    $pPattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[A-Za-z0-9_#@%\*\-]{6,30}$/';
    $cPassword = cleanInput($_POST['cnewP']);
    
    if($password != $cPassword) die("Password mismatch");

    if(!preg_match($unPattern, $username)) {
        die("Username does not match the pattern");
    }

    if(!preg_match($emPattern, $email)) {
        die("Email does not match the pattern");
    }

    if(!preg_match($pPattern, $password)) {
        die("Password does not match the pattern");
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $emailSql ="SELECT `email` FROM `users` WHERE email=:email;";
    $uniqueEm =$db->prepare($emailSql);
    $uniqueEm->bindParam(":email", $email);
    $uniqueEm->execute();
    $emsg="";
    if($uniqueEm->rowCount() > 0) {
        $emsg.="failed to add as Email already exists try again with a different email <br>";
    }

    $usernameSql = "SELECT `username` FROM `users` WHERE username=:username;";
    $uniqueUn = $db->prepare($usernameSql);
    $uniqueUn->bindParam(":username", $username);
    $uniqueUn->execute();
    if($uniqueUn->rowCount() > 0) {
        $emsg.="failed to add as Username already exists try again with a different username<br>";
}

   if($emsg!=""){
    die($emsg);
   }
    





    $signUpSQL = "INSERT INTO `users`(`UID`, `username`, `email`, `password`, `userType`) VALUES (null,:username,:email ,:passwordd,'user')";
    $signUpAdd = $db->prepare($signUpSQL);
    $signUpAdd->bindParam(":username", $username);
    $signUpAdd->bindParam(":email", $email);
    $signUpAdd->bindParam(":passwordd", $password);
    $signUpAdd->execute();
    echo "Successful addition to database!";
    $db=null;
}
?>

<?php 
function cleanInput($input) {
    $input = trim($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>

<?php require("reuse/end.html"); ?>