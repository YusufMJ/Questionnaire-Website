<?php require("reuse/nav.html"); ?>
<?php require('reuse/enforce.php'); ?>
<?php
if(isset($_GET['viewResults'])){
    $QLID=$_GET['QID'];
require('connection.php');
$sql2 = 'SELECT id FROM questions WHERE questionnaire_id='.$QLID;
$sql22 = $db->prepare($sql2);

$sql22->execute();
$questionID= $sql22->fetchAll(PDO:: FETCH_ASSOC);
foreach($questionID as $v){
    echo $v['id'] ;
    echo "<br>";
    $displayR='SELECT q.question_type, q.id AS question_id, r.response
FROM questionnaires qs
JOIN questions q ON qs.id = q.questionnaire_id
JOIN responses r ON q.id = r.questionID
WHERE q.id =:qsid;';

$results= $db->prepare($displayR);
$results->bindParam(':qsid',$v['id']);
$results->execute();
$displayResults = $results->fetchAll(PDO:: FETCH_ASSOC);
$likertC =0;
    $totalLikert=0;
    $TFC=0;
    $TC=0;
    $FC=0;
foreach($displayResults as $responses){
    
    if($responses['question_type']=='likert'){
        $likertC+=1;
        $totalLikert += $responses['response'];
        echo $totalLikert. "<br>";
              
    }
    if($responses['question_type']=='yesno'){
            $TFC+=1;
            if($responses['response']=='true')  {
                $TC+=1;
            }
            else{
               $FC+=1;
            }
        
    }
    
}
if($likertC!=0){
$avglikert = $totalLikert/$likertC;
    echo $avglikert. "<br>";
}
if($TFC!=0){
    $trueAVG = ($TC/$TFC)*100;
    $falseAVG = ($FC/$TFC)*100;
    echo $trueAVG.'%'."<br>";
    }

}


}
?>
<?php require("reuse/end.html"); ?>