<?php
require('connection.php');

if(isset($_POST['title'])){

$title = $_POST['title'];
$description = $_POST['description'];

$query = "insert INTO questionnaires VALUES (null, :title, :description)";
$statement = $db->prepare($query);
$statement->bindParam(':title', $title);
$statement->bindParam(':description', $description);
$statement->execute();

$questionnaire_id = $db->lastInsertId();


$questionCount = $_POST['questionCount'];
for ($i = 1; $i <= $questionCount; $i++) {  
  $question = $_POST["q$i"]; 
  $type = $_POST["type-$i"];  
  

  $query = "insert INTO questions VALUES (null, :questionnaire_id, :question, :type)"; 
  $statement = $db->prepare($query);
  $statement->bindParam(':questionnaire_id', $questionnaire_id);
  $statement->bindParam(':question', $question);
  $statement->bindParam(':type', $type);
  $statement->execute();
  
  
  $question_id = $db->lastInsertId();
  
  if ($type == 'mcq') {  
    
    $op1 = $_POST["OP1-$i"];
    $op2 = $_POST["OP2-$i"];
    $op3 = $_POST["OP3-$i"];
    $op4 = $_POST["OP4-$i"];  
    
    
    $query = "insert INTO mcq_options VALUES (null, :question_id, :option)";  
    $statement = $db->prepare($query);
    
    $statement->bindParam(':question_id', $question_id);  
    $statement->bindParam(':option', $op1);   
    $statement->execute();
    
    $statement->bindParam(':option', $op2);   
    $statement->execute();
    
    $statement->bindParam(':option', $op3);   
    $statement->execute();  
    
    $statement->bindParam(':option', $op4);   
    $statement->execute();
        
  }
}
}else echo "no post yet";

?>