<?php require('reuse/enforce.php');
?>
<?php
$ut=$_SESSION['activeUser'][0];
$un=$_SESSION['activeUser'][2];
if($ut!='admin'){

    die("NOT AUTHORIZED ACCESS TO THIS PAGE!");
}
?>

<?php require("reuse/nav.html"); ?>



<h1 class="text-center mt-5">Questionnaire Lists!</h1>

<p class="text-center mt-5">
  Welcome <?php echo $un;?>  Feel free to answer our Questionnaires :]
</p>


<?php
require("connection.php");
$UID=$_SESSION['activeUser'][1];
$qinfoquery = "SELECT * FROM `questionnaires`";
$qtable = $db->prepare($qinfoquery);
$qtable->execute();
$qtable = $qtable->fetchAll();


?>
<div class="container">
<div class="row my-5 d-flex justify-content-center" id="qLparent">
<?php



$counter=1;
foreach($qtable as $qdata){
  $title = str_replace(' ', '_', $qdata[1]);
?>
<div class="col-12 col-md-6 d-flex mb-5" id="qL<?php $counter+=1; echo $counter;?>">
<div class="btn-container flex-fill">
      <button class="btn btn-outline-dark textColor" type="button" data-bs-toggle="collapse"
      data-bs-target="#<?php echo $title.$qdata[0];?>" aria-expanded="false" aria-controls="<?php echo $title.$qdata[0];?>">
      <?php echo $qdata[1];?></button>
        <div class="collapse" id="<?php echo $title.$qdata[0];?>">
          <div class="text-center">
          <?php echo $qdata[2];?>text number 1
          <a href="displayResponses.php?QID=<?php echo $qdata[0].'&t='.$title;?>" class="btn btn-outline-dark btn-start">Show result</a>
          </div>
        </div>
      
</div>
</div>

<?php
}

?>

















<!--<div class="container">
  <div class="row my-5 d-flex justify-content-center" id="qLparent">

    <div class="col-12 col-md-6 d-flex mb-5" id="qL1">
      <button class="btn btn-outline-dark textColor flex-fill" type="button" data-bs-toggle="collapse"
      data-bs-target="#Zelda1" aria-expanded="false" aria-controls="Zelda1">
        Zelda
        <div class="collapse" id="Zelda1">
          <div class="">
            text number 1
          </div>
        </div>
      </button>
    </div>

    <div class="col-12 col-md-6 d-flex mb-5" id="qL2">
      <button class="btn btn-outline-dark textColor flex-fill" type="button" data-bs-toggle="collapse"
      data-bs-target="#Zelda2" aria-expanded="false" aria-controls="Zelda2">
        Zelda
        <div class="collapse" id="Zelda2">
          <div class="">
            text number 1
          </div>
        </div>
      </button>
    </div>

  </div>
</div>-->

<script src="index.js"></script>

<?php require("reuse/end.html"); ?>