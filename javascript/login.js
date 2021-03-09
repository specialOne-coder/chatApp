// Recuperation
const form = document.querySelector(".containercon form"),
continueBtn = form.querySelector(".logBtn input"),
errorTxt = form.querySelector(".message");

// Pas d'actualisation
form.onsubmit = (e)=>{
    e.preventDefault();
}

// Connexion
continueBtn.onclick = ()=>{
    let ajx = new XMLHttpRequest();
    ajx.open("POST","php/login.php",true);
    ajx.onload = ()=>{
       if(ajx.readyState === XMLHttpRequest.DONE){
           if(ajx.status === 200){
               let data = ajx.response;
               console.log(data);
               if(data == "success"){
                   location.href = "users.php";
               }else{ 
                errorTxt.textContent = data;
                errorTxt.style.display = "block";
               }
           }
       }
    }
    let formData = new FormData(form);
    ajx.send(formData);
}