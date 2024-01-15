let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let button = document.getElementById("btn2");

changeButtonText();

closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  menuBtnChange();
  changeButtonText();
});

button.addEventListener("click", () => {
  sidebar.classList.toggle("open");
  changeButtonText();
});

function menuBtnChange() {
 if(sidebar.classList.contains("open")){
  button.innerHTML = "Log Out"; 
  closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
 }else {
  button.innerHTML = '<i class="bx bx-log-out"></i>'; 
  closeBtn.classList.replace("bx-menu-alt-right","bx-menu");
 }
}

function changeButtonText() {
  if (sidebar.classList.contains("open")) {
    button.innerHTML = "Log Out"; 
  } else {
    button.innerHTML = '<i class="bx bx-log-out"></i>'; 
  }
}
