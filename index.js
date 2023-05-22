const qL1=document.getElementById("qL1");
if(qL1){
    qL1.addEventListener("click", expandDiv);
    function expandDiv() {
        qL1.classList.toggle("col-md-6");
        qL1.classList.toggle("col-md-12");
        console.log("clicked");
    }
    
}
