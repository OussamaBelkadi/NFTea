let box = document.querySelectorAll('.box');
let btnop = document.querySelectorAll('.btn-open');
for(let i=0; i< box.length; i++){
    box[i].addEventListener("mouseover",() =>{
        btnop[i].classList.add("active-tbn");
    });
    box[i].addEventListener("mouseout",() =>{
        btnop[i].classList.remove("active-tbn");
    });
}
