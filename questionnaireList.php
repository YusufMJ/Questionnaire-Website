<?php require('reuse/enforce.php');?>
<?php require("reuse/nav.html");?>
<h1 class="text-center mt-5">Questionnaire Lists!</h1>
<p class="text-center mt-5">Welcome {username}! Feel free to answer our Questionnaires :]</p> 

<div class="container">
  <div class="row my-5 d-flex justify-content-center" id="qLparent">
    <div class="col-12 col-md-6 d-flex mb-5" id="qL1">
      <button class="btn btn-outline-dark textColor flex-fill" type="button" data-bs-toggle="collapse"
      data-bs-target="#Zelda" aria-expanded="false" aria-controls="Zelda">
        Zelda
        <div class="collapse" id="Zelda">
          <div class="">
            text number 1
          </div>
        </div>
      </button>
    </div>
    <div class="col-12 col-md-6 d-flex mb-5">
      <button class="btn btn-outline-dark flex-fill" type="button" data-bs-toggle="collapse"
      data-bs-target="#mario" aria-expanded="false" aria-controls="mario">
        Mario
        <div class="collapse" id="mario">
          <div class="card">
            text number 2
          </div>
        </div>
      </button>
    </div>
  </div>
  
</div>

<script src="index.js"></script>
<?php require("reuse/end.html");?>