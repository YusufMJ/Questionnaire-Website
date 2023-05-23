document.getElementById("addLikert").addEventListener("click", addLikert);
document.getElementById("addYesNo").addEventListener("click", addYesNo);
document.getElementById("addMCQ").addEventListener("click", addMCQ);
document.getElementById("addShort").addEventListener("click", addShort);
document.getElementById("addLikert2").addEventListener("click", addLikert);
document.getElementById("addYesNo2").addEventListener("click", addYesNo);
document.getElementById("addMCQ2").addEventListener("click", addMCQ);
document.getElementById("addShort2").addEventListener("click", addShort);
let questionCount = 0;

document.getElementById("save").addEventListener("click", saveForm);
document.getElementById("clear").addEventListener("click", deleteFormQs);
document.getElementById("save2").addEventListener("click", saveForm);
document.getElementById("clear2").addEventListener("click", deleteFormQs);

function deleteFormQs(){
   questionCount=0;
   questions.innerHTML="";

}

function saveForm() {
questions.insertAdjacentHTML("beforeend", `<input type="hidden" name="questionCount" value="${questionCount}">`)
  const formData = new FormData(document.querySelector("form"));
  

  fetch("formProcessing.php", {
    method: "POST",
    body: formData
  }).then(res => {
    if (res.ok) {
      alert("successful");  
    } else {
      alert("There was an error saving the form");
    }
  });
}



function addLikert() {
    questionCount++;  
    likertQ = `<div class="row my-5 text-center">
    <div class="col">
       <label for="q${questionCount}">Question #${questionCount}  </label>
       <input class="btn-size" type="text" placeholder="abc?" id="q${questionCount}" name="q${questionCount}" value="q${questionCount}">
       <input type="range" id="temp" name="temp" list="markers" />
       <datalist id="markers">
          <option value="0">1</option>
          <option value="25">2</option>
          <option value="50">3</option>
          <option value="75">4</option>
          <option value="100">5</option>
       </datalist>
       <input type="hidden" name="type-${questionCount}" value="likert"> 
    </div>
 </div>`;
    questions.insertAdjacentHTML("beforeend", likertQ);
}

function addYesNo() {
    questionCount++;  
    booleanQ = ` <div class="row my-5 text-center">
    <div class="col">
       <label for="q${questionCount}">Question #${questionCount}  </label>
       <input class="btn-size" type="text" placeholder="abc?" id="q${questionCount}" name="q${questionCount}" value="q${questionCount}">
       <label for="true">True</label>
       <input class="me-2" type="radio" name="TF" id="true">
       <label class="ms-2" for="false">False</label>
       <input type="radio" name="TF" id="false">
       <input type="hidden" name="type-${questionCount}" value="yesno"> 
    </div>
 </div>`;
    questions.insertAdjacentHTML("beforeend", booleanQ);
}

function addMCQ() {
    questionCount++;  
    mcQ = `<div class="row my-5 text-center">
    <div class="col">
       <label for="q${questionCount}">Question #${questionCount} </label>
       <input class="btn-size" type="text" placeholder="abc?" id="q${questionCount}" name="q${questionCount}" value="q${questionCount}">
       <div>
          <input type="text" name="OP1-${questionCount}" id="OP1-${questionCount}" placeholder="option 1" value="OP1-${questionCount}">
          <input type="text" name="OP2-${questionCount}" id="OP2-${questionCount}"  placeholder="option 2" value="OP2-${questionCount}">
          <input type="text" name="OP3-${questionCount}" id="OP3-${questionCount}" placeholder="option 3" value="OP3-${questionCount}">
          <input type="text" name="OP4-${questionCount}" id="OP4-${questionCount}" placeholder="option 4" value="OP4-${questionCount}">
          <input type="hidden" name="type-${questionCount}" value="mcq"> 
       </div>
    </div>
 </div>`;
    questions.insertAdjacentHTML("beforeend", mcQ);
}

function addShort() {
questionCount++;  
  shortAnswer = `<div class="row my-5 text-center">
  <div class="col">
     <label for="q${questionCount}">Question #${questionCount}  </label>
     <input class="btn-size" type="text" placeholder="abc?" id="q${questionCount}" name="q${questionCount}" value="q${questionCount}">
     <label for="shortA">Short answer: </label>
     <input type="text" name="ShortA" id="ShortA" value="shorttt">
     <input type="hidden" name="type-${questionCount}" value="short"> 
  </div>
</div>`;
  questions.insertAdjacentHTML("beforeend", shortAnswer);
}