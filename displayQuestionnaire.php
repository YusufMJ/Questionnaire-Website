<?php require("reuse/nav.html"); ?>
<?php require('reuse/enforce.php'); ?>
<?php
require('connection.php');
if (isset($_GET['QID'])) {
    $QID = $_GET['QID'];
    $displaySQL = 'SELECT * FROM `questions` WHERE questionnaire_id=:QID';
    $displayQ = $db->prepare($displaySQL);
    $displayQ->bindParam(':QID', $QID);
    $displayQ->execute();
    $data = $displayQ->fetchAll(PDO::FETCH_ASSOC);

    echo "<br>";

    echo "<div class=' '>
              <form>";
    foreach ($data as $question) {
        
        if ($question['question_type'] == 'mcq') {

            $displayMCQ = 'SELECT optionText FROM mcqoptions WHERE questionID=:id';
            $displayOpt = $db->prepare($displayMCQ);
            $displayOpt->bindParam(':id', $question['id']);
            $displayOpt->execute();
            $options = $displayOpt->fetchAll(PDO::FETCH_ASSOC);


            echo " <div class='col text-center '>
         <div>
             <br>
          </div>
          <div class ='mt-5'>
             {$question['question_text']} <br>";
            foreach ($options as $opt) {

                echo "<input type='radio' name='{$question['id']}' id='OP1-{$question['id']}' placeholder='option 1' >
  {$opt['optionText']}";
            }
            echo " </div>    

</div>";




        } else if ($question['question_type'] == 'yesno'){
           echo " <div class='col text-center mt-5'>
       {$question['question_text']}
         <br>   
       
       <label for='true'>True</label>
       <input class='me-2' type='radio' name='TF' id='true'>
       <label class='ms-2' for='false'>False</label>
       <input type='radio' name='TF' id='false'>
      
    </div>";

        }
        else if($question['question_type']=='short'){
            echo "<div class='col mt-5 text-center'>".$question['question_text']." <br>
     <label for='shortA'>Short answer: </label>
     <input type='text' name='ShortA' id='ShortA' >
        
  </div>";
        }
        else if($question['question_type']=='likert'){
            echo'<div class="col text-center mt-5">'.$question['question_text'].
       '<br>
       <input type="range" id="temp" name="temp" list="markers" />
       <datalist id="markers">
          <option value="0">1</option>
          <option value="25">2</option>
          <option value="50">3</option>
          <option value="75">4</option>
          <option value="100">5</option>
       </datalist>
       
   
     
  </div>
</div>';
    }
}

    echo "</form>";
    echo "</div>";

}
?>
<?php require("reuse/end.html"); ?>