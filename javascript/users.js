// Recuperation des elements
const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
userList = document.querySelector(".users .users-list");

// Afficher faire disparaitre la barre de recherche
searchBtn.onclick = ()=>{
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBtn.classList.toggle("active");
  searchBar.value = "";
}

setInterval(()=>{
  let ajx = new XMLHttpRequest();
  ajx.open("GET","php/users-server.php",true);
  ajx.onload = ()=>{
     if(ajx.readyState === XMLHttpRequest.DONE){
         if(ajx.status === 200){
             let data = ajx.response;
             if(!searchBar.classList.contains("active")){
               userList.innerHTML = data;
             }
         }
     }
  }
  ajx.send();
},500)