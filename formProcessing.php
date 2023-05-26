<?php
require('connection.php');

if (isset($_POST['title'])) {

    try {
        $title = $_POST['title'];
        $description = $_POST['description'];

        $qLquery = "INSERT INTO questionnaires VALUES (null, :title, :description)";
        $qlStatement = $db->prepare($qLquery);
        $qlStatement->bindParam(':title', $title);
        $qlStatement->bindParam(':description', $description);
        $qlStatement->execute();

        $questionnaireID = $db->lastInsertId();

        $qsquery = "INSERT INTO questions VALUES (null, :questionnaire_id, :question, :type)";
        $qsStatement = $db->prepare($qsquery);
        $qsStatement->bindParam(':questionnaire_id', $questionnaireID);
        $qsStatement->bindParam(':question', $question);
        $qsStatement->bindParam(':type', $type);

        $mcqquery = "INSERT INTO mcqoptions VALUES (null, :question_id, :option)";
        $mcqStatement = $db->prepare($mcqquery);

        $questionCount = $_POST['questionCount'];
        for ($i = 1; $i <= $questionCount; $i++) {
            $question = $_POST["q$i"];
            $type = $_POST["type-$i"];

            $qsStatement->execute();

            $questionID = $db->lastInsertId();

            if ($type == 'mcq') {

                $op1 = $_POST["OP1-$i"];
                $op2 = $_POST["OP2-$i"];
                $op3 = $_POST["OP3-$i"];
                $op4 = $_POST["OP4-$i"];
                $mcqStatement->bindParam(':question_id', $questionID);
                $mcqStatement->bindParam(':option', $op1);
                $mcqStatement->execute();
                $mcqStatement->bindParam(':option', $op2);
                $mcqStatement->execute();
                $mcqStatement->bindParam(':option', $op3);
                $mcqStatement->execute();
                $mcqStatement->bindParam(':option', $op4);
                $mcqStatement->execute();
            }
        }
    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }

} else {
    echo "No POST yet";
}
$db = null;
?>