<?php require("reuse/nav.html");?>
<?php require('reuse/enforce.php'); ?>
<?php
if(isset($_GET['submit'])){
    require('connection.php');
    $UID=$_SESSION['activeUser'][1];
    foreach($_GET as $key => $value){
        $explode = explode('-', $key);

        if (count($explode) < 2) {
            continue;// this skips the foreach very useful
        }

        $questionID = $explode[1];

        $checkQuery = "SELECT * FROM responses WHERE UID = :userID AND questionID = :questionID";
        $checkStmt = $db->prepare($checkQuery);
        $checkStmt->bindParam(':userID', $UID);
        $checkStmt->bindParam(':questionID', $questionID);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            die("You can't submit more than once! if you wish to edit go back to the list and select edit...");
        }

        //echo $UID." ";
        //echo $key." ";
        //echo $questionID." ";
        //echo $value." "; 
        $resquery = "INSERT INTO responses VALUES (null,:userID , :questionID, :answer)";
        
        $resQ = $db->prepare($resquery);
        $resQ->bindParam(':userID', $UID);
        $resQ->bindParam(':questionID', $questionID);
        $resQ->bindParam(':answer', $value);
        $resQ->execute();
    }
    echo "Successfully added response :) thank you";
   
}
 ?>

<?php require("reuse/end.html"); ?>