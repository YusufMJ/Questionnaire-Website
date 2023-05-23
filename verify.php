<?php

session_start();

if(isset($_POST['user'])){
    try{

        $Suser = trim(htmlspecialchars($_POST['user']));
        $Spass = trim(htmlspecialchars($_POST['pass'])); 
        
        $pattern ="/^[A-Za-z0-9]{3,15}$/"; // any character or number min 3 max 15.
        $pattern2 ="/^(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z])[A-Za-z0-9_#@%*\-]{6,30}$/"; // at least one Capital One Small One number. some special characters allowed. min 6 max 30.
        
        if(!preg_match($pattern, $Suser)) die("Invalid username syntax (any character or number min 5 max 20 only.)");
    
        if(!preg_match($pattern2, $Spass)) die("Invalid password syntax at least one Capital One Small One number. some special characters allowed. min 6 max 24.)");
        require('connection.php');
    
        $sql="select * from users where username= :user";
    
        $userTable= $db->prepare($sql);
        $userTable->bindParam(":user", $Suser);
        $userTable->execute();
    
        if($userData = $userTable->fetch(PDO::FETCH_ASSOC)){
            if (password_verify($Spass,$userData['password'])) {
            $_SESSION['activeUser']= $userData['userType'];
           // echo "valid username and password combination";  
            header('location:index.php');
        }else echo "Invalid username and password combination";
        }else die("this username is not stored in the database");
    
        
        $db=null;
    
    }catch(PDOException $e){
        die($e->getMessage());
    
    }
}


?>