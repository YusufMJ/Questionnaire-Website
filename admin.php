<?php require("reuse/nav.html");?>
<div class="container">
   <main class="formB ">
      <form>
         <div>
            <br>
         </div>
         <div class="pageT text-center">
            <h1>Create a Questionnaire List!</h1>
         </div>
         <div class="row my-5 text-center">
            <div class="col">
               <label for="title">Title: </label>
               <input type="text" placeholder="Enter a title here" id="title">
            </div>
         </div>
         <div class="row">
            <div class="col text-center d-md-none">Write the Description below</div>
         </div>
         <div class="row">
            <div class="col d-flex justify-content-center ">
               <div class="col-10 col-md-8 d-flex justify-content-center">
                  <label class="me-1 d-none d-md-block" for="description">Description: </label>
                  <textarea class="flex-fill ms-auto me-auto" name="description" id="description" cols="50" rows="6" placeholder="Enter description here"></textarea>
               </div>
            </div>
         </div>
         <div id="questions">
            <div class="row my-5 text-center">
               <div class="col">
                  <label for="title">Question: </label>
                  <input class="btn-size" type="text" placeholder="abc?" id="q1">
                  <label for="true">True</label>
                  <input class="me-2" type="radio" name="TF" id="true">
                  <label class="ms-2" for="false">False</label>
                  <input type="radio" name="TF" id="false">
               </div>
            </div>
            <div class="row my-5 text-center">
               <div class="col">
                  <label for="title">Question: </label>
                  <input class="btn-size" type="text" placeholder="abc?" id="q2">
                  <div>
                     <input type="checkbox" name="MCQ" ><input type="text" name="OP1" id="OP1" placeholder="option 1">
                     <input type="checkbox" name="MCQ" ><input type="text" name="OP2" id="OP2"  placeholder="option 2">
                     <input type="checkbox" name="MCQ" ><input type="text" name="OP3" id="OP3" placeholder="option 3">
                     <input type="checkbox" name="MCQ" ><input type="text" name="OP4" id="OP4" placeholder="option 4">
                  </div>
               </div>
            </div>
            <div class="row my-5 text-center">
               <div class="col">
                  <label for="title">Question: </label>
                  <input class="btn-size" type="text" placeholder="abc?" id="q3">
                  <label for="shortA">Short answer: </label>
                  <input type="text" name="ShortA" id="ShortA">
               </div>
            </div>
            <div class="row my-5 text-center">
               <div class="col">
                  <label for="title">Question: </label>
                  <input class="btn-size" type="text" placeholder="abc?" id="q4">
                  <input type="range" id="temp" name="temp" list="markers" />
                  <datalist id="markers">
                     <option value="0">1</option>
                     <option value="25">2</option>
                     <option value="50">3</option>
                     <option value="75">4</option>
                     <option value="100">5</option>
                  </datalist>
               </div>
            </div>
            <div><input type="submit" value="Submit"></div>
            <br>
            <br>
         </div>
      </form>
   </main>
   <footer class="formBtn sticky-bottom">
      <br>
      <div class="row btn-group d-none d-md-flex justify-content-center px-5 p-md-0">
         <div class="col-12 col-sm-6 col-md-2">
            <button class="btn btn-outline-light btn-lg btn-size">Likert</button>
         </div>
         <div class="col-12 col-sm-6 col-md-2">
            <button  class="btn btn-outline-light btn-lg btn-size" value="T/F" id="yes/no" onclick="addYesNO()">T/F</button>
         </div>
         <div class="col-12 col-sm-6 col-md-2">
            <button class="btn btn-outline-light btn-lg btn-size">MCQ</button>
         </div>
         <div class="col-12 col-sm-6 col-md-2">
            <button class="btn btn-outline-light text-nowrap btn-lg btn-size">Short</button>
         </div>
      </div>
      <div class="row d-none d-md-flex justify-content-center  justify-content-md-between mt-4">
         <div class="col-6 col-sm-5 col-md-2 ms-5">
            <button class="btn btn-outline-light btn-lg btn-size">Clear</button>
         </div>
         <div class="col-6 col-sm-5 col-md-2 me-5">
            <button class="btn btn-outline-light btn-lg btn-size">Save</button>
         </div>
      </div>
      <div class="row btn-group d-flex d-md-none justify-content-center px-5 p-md-0">
         <div class="col-12 col-sm-6 col-md-2">
            <button class="btn btn-outline-light btn-size">Likert</button>
         </div>
         <div class="col-12 col-sm-6 col-md-2">
            <button class="btn btn-outline-light btn-size">T/F</button>
         </div>
         <div class="col-12 col-sm-6 col-md-2">
            <button class="btn btn-outline-light btn-size">MCQ</button>
         </div>
         <div class="col-12 col-sm-6 col-md-2">
            <button class="btn btn-outline-light text-nowrap btn-size">Short</button>
         </div>
      </div>
      <div class="row d-flex d-md-none justify-content-center  justify-content-md-between mt-4">
         <div class="col-6 col-sm-5 col-md-2">
            <button class="btn btn-outline-light btn-size">Clear</button>
         </div>
         <div class="col-6 col-sm-5 col-md-2">
            <button class="btn btn-outline-light btn-size">Save</button>
         </div>
      </div>
   </footer>
</div>

<script src="index.js"></script>
<?php require("reuse/end.html");?>