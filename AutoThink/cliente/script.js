let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let button = document.getElementById("btn2");

// editButton = document.getElementById('edit-button');
//const editContainer = document.querySelector('.editar-container');
//const editInput = document.getElementById('edit-input');
//const saveButton = document.getElementById('save-button');

changeButtonText();

closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  menuBtnChange();//calling the function(optional)
  changeButtonText();
});

button.addEventListener("click", () => {
  sidebar.classList.toggle("open");
  changeButtonText();
});

// following are the code to change sidebar button(optional)
function menuBtnChange() {
 if(sidebar.classList.contains("open")){
  button.innerHTML = "Log Out"; 
  closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
 }else {
  button.innerHTML = '<i class="bx bx-log-out"></i>'; 
  closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
 }
}

function changeButtonText() {
  if (sidebar.classList.contains("open")) {
    button.innerHTML = "Log Out"; 
  } else {
    button.innerHTML = '<i class="bx bx-log-out"></i>'; 
  }
}

//editButton.addEventListener('click', () => {
    //info.style.display = 'none';
    //editInput.value = info.textContent;
    //editContainer.style.display = 'block';
//});

// Adicionar um ouvinte de evento ao botão "Salvar"
//saveButton.addEventListener('click', () => {
   // info.textContent = editInput.value;
   // info.style.display = 'block';
   // editContainer.style.display = 'none';
//});