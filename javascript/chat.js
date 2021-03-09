// Recuperation
const form = document.querySelector(".typing"),
input = form.querySelector(".input-message"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

// Pas d'actualisation
form.onsubmit = (e)=>{
    e.preventDefault();
}

// Envoi et reception de message
sendBtn.onclick = ()=>{
    let ajx = new XMLHttpRequest();
    ajx.open("POST","php/chat-servers-insert.php",true);
    ajx.onload = ()=>{
       if(ajx.readyState === XMLHttpRequest.DONE){
           if(ajx.status === 200){
               let data = ajx.response;
               input.value = "";
               console.log(data);
           }
       }
    }
    let formData = new FormData(form);
    ajx.send(formData);
}

// Non scroll si l'utilisateur défile
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}


// Recuperation et affichage des messages chaque 500ms
setInterval(()=>{
    let ajx = new XMLHttpRequest();
    ajx.open("POST","php/chat-servers-get.php",true);
    ajx.onload = ()=>{
       if(ajx.readyState === XMLHttpRequest.DONE){
           if(ajx.status === 200){
               let data = ajx.response;
                 chatBox.innerHTML = data;
                 if(!chatBox.classList.contains("active")){
                    versLeBas();
                 }
                 
           }
       }
    }
    let formData = new FormData(form);
    ajx.send(formData);
  },500)

  function versLeBas(){
      chatBox.scrollTop = chatBox.scrollHeight;
  }