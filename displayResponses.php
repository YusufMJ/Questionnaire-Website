<?php require("reuse/nav.html"); ?>
<?php require('reuse/enforce.php'); ?>

<?php
if (isset($_GET['QID'])) {
    $QLID = $_GET['QID'];
    $t = $_GET['t'];
    require('connection.php');
    $sql2 = 'SELECT id FROM questions WHERE questionnaire_id=' . $QLID;
    $sql22 = $db->prepare($sql2);

    $sql22->execute();
    $questionID = $sql22->fetchAll(PDO::FETCH_ASSOC);

    echo "<div class='container'>";
    echo "<br><form class='display p-5'>";
    $title = str_replace('_', ' ', $t);
        echo "<h1 class='text-center'>".$title."</h1>";

    foreach ($questionID as $v) {
        $displayR = 'SELECT q.question_text, q.question_type, q.id AS question_id, r.response
    FROM questionnaires qs
    JOIN questions q ON qs.id = q.questionnaire_id
    JOIN responses r ON q.id = r.questionID
    WHERE q.id =:qsid;';

        $results = $db->prepare($displayR);
        $results->bindParam(':qsid', $v['id']);
        $results->execute();
        $displayResults = $results->fetchAll(PDO::FETCH_ASSOC);
        $likertC = 0;
        $totalLikert = 0;
        $TFC = 0;
        $TC = 0;
        $FC = 0;
        $sc=0;
        $mc=0;

        $countRsql = "SELECT COUNT(DISTINCT responses.UID) as unique_users FROM responses INNER JOIN questions ON responses.questionID = questions.id WHERE questions.questionnaire_id=" . $QLID;
        $countResponses = $db->query($countRsql);
        $usersCount = $countResponses->fetch(PDO::FETCH_ASSOC);

        foreach ($displayResults as $responses) {


            if ($responses['question_type'] == 'likert') {
                $likertC += 1;
                $totalLikert += $responses['response'];
            }

            if ($responses['question_type'] == 'yesno') {
                $TFC += 1;
                if ($responses['response'] == 'true') {
                    $TC += 1;
                } else {
                    $FC += 1;
                }
            }
            if ($responses['question_type'] == 'mcq') {
                $mc += 1;
                $mcqOptionQuery = $db->prepare("SELECT optionText FROM mcqoptions WHERE questionID=?");
                $mcqOptionQuery->execute(array($v['id']));
                $choices = $mcqOptionQuery->fetchAll(PDO::FETCH_ASSOC);
                $i = 1;
            
                foreach ($choices as $choice) {
                    $eachMcqCount = $db->prepare("SELECT COUNT(*) as tnum FROM responses WHERE questionID=? AND response=?");
                    $eachMcqCount->execute(array($v['id'], $choice['optionText']));
                    $eachCnt = $eachMcqCount->fetch()['tnum'];
                    $option[$i] = $eachCnt;
                    $i++;
                }
            }

            if ($responses['question_type'] == 'short') {
                $saArray[$sc]=htmlspecialchars($responses['response']);
                $sc+=1;
                
            }
        }

        if ($likertC != 0) {
            $avglikert = $totalLikert / $likertC;?>
            <div class='col text-center'> <div class ='mt-5 questionBorder'><h4 class='mt-2'> <?php echo $responses['question_text'] ?> </h4> <br>The average likert is
              <?php echo $avglikert; ?></div></div><?php  
        }
        if ($mc != 0) {
            ?>
            <div class='col text-center'>
                <div class='mt-5 questionBorder'>
                    <h4 class='mt-2'><?php echo $responses['question_text'] ?></h4><br>
                    The MCQ options percentage:
                    <ul>
                    <?php
                    // Calculate the total count
                    $total_count = array_sum($option);
        
                    // Display percentage for each option
                    $i = 1;
                    foreach ($choices as $choice) {
                        $percentage = ($option[$i] / $total_count) * 100;
                        echo "<li>" . $choice['optionText'] . ": " . round($percentage, 2) . "%</li>";
                        $i++;
                    }
                    ?>
                    </ul>
                </div>
            </div>
            <?php
        }
        if ($TFC != 0) {
            $trueAVG = ($TC / $TFC) * 100;
            $falseAVG = ($FC / $TFC) * 100;?>
            <div class='col text-center'> <div class ='mt-5 questionBorder'><h4 class='mt-2'> <?php echo $responses['question_text'] ?> </h4> <br>
             The true percentage is <?php echo $trueAVG."% "; ?>The false percentage is <?php echo $falseAVG."%"; ?></div></div><?php  
        }
        if ($sc != 0) {
            ?>
            <div class='col text-center'> <div class ='mt-5 questionBorder'><h4 class='mt-2'> <?php echo $responses['question_text'] ?> </h4> <br>
            The short answers list: <ul>
              <?php
              for($i=0;$i<$sc;$i++){
                echo "<li>".$saArray[$i]."</li>";
              }
              ?></ul>
              
              
              
              </div></div><?php  
        }
    }
    ?>
<div class='col text-center'>
    <div class='mt-5 questionBorder'>
        <h4 class='mt-2'>Total responses to the questionnaire:
        <?php echo $usersCount['unique_users']; ?></h4>
    </div>
</div>
<?php
    echo "</form>";
    echo "</div>";
}
?>
<?php require("reuse/end.html"); ?>