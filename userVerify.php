<?php require('reuse/enforce.php');?>
<?php require("reuse/nav.html");?>

<?php

 require('connection.php');
$UID=$_SESSION['activeUser'][1];

if(isset($_POST['newUN'])){
    
    $username = cleanInput($_POST['newUN']);
    $unPattern = '/^[A-Za-z0-9]{3,15}$/';
    

    if(!preg_match($unPattern, $username)) {
        die("Username does not match the pattern");
    }
    
    

    $usernameSql = "SELECT `username` FROM `users` WHERE username=:username;";
    $uniqueUn = $db->prepare($usernameSql);
    $uniqueUn->bindParam(":username", $username);
    $uniqueUn->execute();
    if($uniqueUn->rowCount() > 0) {
        die("failed to add as Username already exists try again with a different username<br>");
}

   
    





    $updateUN = 'UPDATE `users` SET `username`=:user WHERE UID='.$UID;
    
    $updateUsername = $db->prepare($updateUN);
    $updateUsername->bindParam(":user", $username);
    $updateUsername->execute();
    echo "Successfully updated username <br>";
    
}
if(isset($_POST['newEmail'])){
    $newemail = cleanInput($_POST['newEmail']);
    $emPattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,5}$/';
    if(!preg_match($emPattern, $newemail)) {
        die("Invalid Email");
    }
    $emailSql ='SELECT  `email`  FROM `users` WHERE  email=:email';
   
    $changeEM=$db->prepare($emailSql);
    
    $changeEM->bindParam(":email",$newemail);
    echo $emailSql;
    $changeEM->execute();
    if($uniqueUn->rowCount() > 0) {
        die("Email already in use try a different email<br>");
}
$updateEmail = 'UPDATE `users` SET `email`=:email2 WHERE UID='.$UID;
$updateEmail2 = $db->prepare($updateEmail);
$updateEmail2->bindParam(":email2",$newemail);
$updateEmail2->execute();
echo "Successfully updated Email <br>";
    $db=null;

}
if(isset($_POST['newP'])){
    
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