// Recuperation des elements
const password = document.querySelector(".containercon input[type='password']"),
visuelBtn = document.querySelector(".containercon .field i");

// Cacher et faire voir le mot de passe 
visuelBtn.onclick = ()=>{
    if(password.type == "password"){
        password.type = "text"
        visuelBtn.classList.add("active");
    }else{
        password.type = "password";
        visuelBtn.classList.remove("active");
    }
}