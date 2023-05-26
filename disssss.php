<?php require("reuse/nav.html"); ?>
<?php require('reuse/enforce.php'); ?>
<div class='container '>
    <form>
    <div class="col text-center mt-5">
      Question #${questionCount}  
       <input class="btn-size" type="text" placeholder="abc?" ">
       <input type="range" id="temp" name="temp" list="markers" />
       <datalist id="markers">
          <option value="0">1</option>
          <option value="25">2</option>
          <option value="50">3</option>
          <option value="75">4</option>
          <option value="100">5</option>
       </datalist>
       
   
     
  </div>
</div>`;

</div>
</form>
</div>
<?php require("reuse/end.html"); ?>