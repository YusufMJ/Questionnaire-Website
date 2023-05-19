const qL1=document.getElementById("qL1");
qL1.addEventListener("click", expandDiv);
function expandDiv() {
    qL1.classList.remove("col");
    qL1.classList.add("col-12");
    qL1.lastElementChild.classList.toggle("hidden");
}