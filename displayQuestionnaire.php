<?php require("reuse/nav.html"); ?>
<?php require('reuse/enforce.php'); ?>


    <?php
    require('connection.php');
    if (isset($_GET['QID'])) {
        $QID = $_GET['QID'];
        $t = $_GET['t'];
        $displaySQL = 'SELECT * FROM `questions` WHERE questionnaire_id=:QID';
        $displayQ = $db->prepare($displaySQL);
        $displayQ->bindParam(':QID', $QID);
        $displayQ->execute();
        $data = $displayQ->fetchAll(PDO::FETCH_ASSOC);

        echo "<br>";

        echo "<div class='container'>
                  <form action='saveResponse.php' method='get' class='display p-5'>";
        $title = str_replace('_', ' ', $t);
        echo "<h1 class='text-center'>".$title."</h1>";
        foreach ($data as $question) {

            if ($question['question_type'] == 'mcq') {

                $displayMCQ = 'SELECT optionText FROM mcqoptions WHERE questionID=:id';
                $displayOpt = $db->prepare($displayMCQ);
                $displayOpt->bindParam(':id', $question['id']);
                $displayOpt->execute();
                $options = $displayOpt->fetchAll(PDO::FETCH_ASSOC);

                echo "<div class='col text-center'>
                     <div>
                         <br>
                      </div>
                      <div class ='mt-5'>
                         {$question['question_text']} <br>";
                foreach ($options as $opt) {

                    echo "<input type='radio' name='mcq-{$question['id']}' required>
                          {$opt['optionText']}";
                }
                echo " </div>
                </div>";

            } else if ($question['question_type'] == 'yesno') {
                echo "<div class='col text-center mt-5'>
                    {$question['question_text']}
                      <br>

                    <label for='true'>True</label>
                    <input class='me-2' type='radio' name='TF-{$question['id']}' value='true' required>
                    <label class='ms-2' for='false'>False</label>
                    <input type='radio' name='TF-{$question['id']}' value='false'>

                </div>";

            } else if ($question['question_type'] == 'short') {
                echo "<div class='col mt-5 text-center'>
                        {$question['question_text']} <br>
                        <label for='shortA'>Short answer: </label>
                        <input type='text' name='ShortA-{$question['id']}' required>
                    </div>";
            } else if ($question['question_type'] == 'likert') {
                echo '<div class="col text-center mt-5">'.$question['question_text'].
                '<br>
                <input type="range" name=likert-'.$question['id'].
                ' list="markers" />
                <datalist id="markers">
                    <option value="0">1</option>
                    <option value="25">2</option>
                    <option value="50">3</option>
                    <option value="75">4</option>
                    <option value="100">5</option>
                </datalist>
                </div>';
            }
        }
        //echo '<input type="hidden" name="qid" value='.$QID.'>';
        echo '<button type="submit" name="submit" class="btn btn-outline-dark mt-5">Submit</button>';
        echo "</form>";
        echo "</div>";

    }
    ?>
    <?php require("reuse/end.html"); ?>
