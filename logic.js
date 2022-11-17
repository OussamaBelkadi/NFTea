      // NAVBAR MOBIL
   const openbtn = document.querySelector(".resp-ico"); 
   const closebtn = document.querySelector(".clo-ico");
   const navbarmobil = document.querySelector('.NAVBAR');

   openbtn.addEventListener("click",()=>{
       navbarmobil.style.right = "0"; 
   })
   closebtn.addEventListener("click",()=>{
       navbarmobil.style.right = "-100%"; 
   })

  
   