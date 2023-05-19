<?php require("reuse/nav.html");?>


<div class="container">
        <main class="formB">
            <form action="">
                <div>
                    <br>
                </div>
                <div class="pageT text-center"><h1>Create a Questionnaire List!</h1></div>
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
                
            </form>

        </main>
        <footer class="formBtn sticky-bottom">
            <br>
            <div class="col">
                <div class="row btn-group d-flex justify-content-center">
                    
                <div class="col-2 d-flex text-center">
                       <button class="btn btn-outline-light btn-lg flex-fill">Likert</button>
                    </div>
                    <div class="col-12 d-flex d-sm-none text-center">
                       <button class="btn btn-outline-light btn-lg flex-fill hidden"></button>
                    </div>

                    <div class="col-2 d-flex text-center">
                       <button class="btn btn-outline-light btn-lg flex-fill">T/F</button>
                    </div>
                    <div class="col-12 d-flex d-md-none text-center">
                       <button class="btn btn-outline-light btn-lg flex-fill hidden"></button>
                    </div>


                    <div class="col-2 d-flex text-center">
                       <button class="btn btn-outline-light btn-lg flex-fill">MCQ</button>
                    </div>
                  
                    <div class="col-12 d-flex d-sm-none text-center">
                       <button class="btn btn-outline-light btn-lg flex-fill hidden"></button>
                    </div>
                    <div class="col-2 d-flex text-center">
                       <button class="btn btn-outline-light text-nowrap btn-lg flex-fill">Short</button>
                    </div>
                

                   
                
                 </div>

            </div>
            <div class="col">
                <div class="row d-flex justify-content-between mt-4">
                   
                    <div class="col-2 d-flex ms-3">
                       <button class="btn btn-outline-light flex-fill">Clear</button>
                    </div>
                    
                    <div class="col-2 d-flex text-end me-3">
                       <button class="btn btn-outline-light flex-fill">Save</button>
                    </div>
                 </div>

            </div>
       
            
         </footer>
    </div>



<?php require("reuse/end.html");?>