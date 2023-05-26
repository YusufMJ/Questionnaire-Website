<?php require('reuse/enforce.php'); ?>
<?php require("reuse/nav.html"); ?>

<h1 class="text-center mt-5">Questionnaire Lists!</h1>

<p class="text-center mt-5">
  Welcome username Feel free to answer our Questionnaires :]
</p>

<div class="container">
  <div class="row my-5 d-flex justify-content-center" id="qLparent">

    <div class="col-12 col-md-6 d-flex mb-5" id="qL1">
      <div class="btn-container flex-fill">
        <button class="btn btn-outline-dark textColor" type="button" data-bs-toggle="collapse"
        data-bs-target="#Zelda1" aria-expanded="false" aria-controls="Zelda1">
          Zelda
        </button>
        <div class="collapse" id="Zelda1">
          <div class="text-center">
            text number 1
            aaaaa
            <a href="login.php" class="btn btn-outline-dark btn-start">Start</a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6 d-flex mb-5" id="qL2">
      <div class="btn-container flex-fill">
        <button class="btn btn-outline-dark textColor" type="button" data-bs-toggle="collapse"
        data-bs-target="#Zelda2" aria-expanded="false" aria-controls="Zelda2">
          Zelda
        </button>
        <div class="collapse" id="Zelda2">
          <div class="">
            text number 1
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<script src="index.js"></script>

<?php require("reuse/end.html"); ?>