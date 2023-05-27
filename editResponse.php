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

        //echo $UID." ";
        //echo $key." ";
        //echo $questionID." ";
        //echo $value." "; 
        $resquery = "UPDATE responses SET response = :answer WHERE UID = :userID AND questionID = :questionID;";
        $resQ = $db->prepare($resquery);
        $resQ->bindParam(':userID', $UID);
        $resQ->bindParam(':questionID', $questionID);
        $resQ->bindParam(':answer', $value);
        $resQ->execute();
    }
    echo "Successfully updated response :) thank you";
}
 ?>

<?php require("reuse/end.html"); ?>