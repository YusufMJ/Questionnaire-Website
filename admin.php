<?php require("reuse/nav.html");?>


<div class="container">
        <main class="formB ">
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
        <div class="row btn-group d-none d-md-flex justify-content-center px-5 p-md-0">
            <div class="col-12 col-sm-6 col-md-2">
                <button class="btn btn-outline-light btn-lg btn-size">Likert</button>
            </div>
            <div class="col-12 col-sm-6 col-md-2">
                <button class="btn btn-outline-light btn-lg btn-size">T/F</button>
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