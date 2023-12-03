// 2nd
searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
}

//login form
let loginForm = document.querySelector('.login-form-container');

document.querySelector('#login-btn').onclick = () =>{
    loginForm.classList.toggle('active');
}

document.querySelector('#close-login-btn').onclick = () =>{
    loginForm.classList.remove('active');
} 

// register form
let registerForm = document.querySelector('.register-form-container');

document.querySelector('#register-btn').onclick = () =>{
    registerForm.classList.toggle('active');
}

document.querySelector('#close-register-btn').onclick = () =>{
    registerForm.classList.remove('active');
}

// 1st
window.onscroll = () =>{

    // 3rd
    searchForm.classList.remove('active');


    if(window.scrollY > 80){
        document.querySelector('.header .header-2').classList.add('active');    
    }else{
        document.querySelector('.header .header-2').classList.remove('active'); 
    }
}

window.onload = () =>{
    if(window.scrollY > 80){
        document.querySelector('.header .header-2').classList.add('active');    
    }else{
        document.querySelector('.header .header-2').classList.remove('active'); 
    }
}


// DROPDOWN MENU
function myFunctionDown(){
    var dropdown = document.getElementById("myDropdown");
    var icon = document.getElementById("icon");
  
    dropdown.classList.toggle("show");
  
    if (dropdown.classList.contains("show")){
        icon.classList.remove("fa-caret-down");
        icon.classList.add("fa-caret-up");
    }else {
        icon.classList.remove("fa-caret-up");
        icon.classList.add("fa-caret-down");
    }
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var icons = document.getElementsByClassName("fas");
    
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      var icon = icons[i];
      
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
        icon.classList.remove('fa-caret-up');
        icon.classList.add('fa-caret-down');
      }
    }
  }
}


// DROPUP MENU
function myFunctionUp() {
  document.getElementById("myDropup").classList.toggle("show");
}

// Close the dropup menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropups = document.getElementsByClassName("dropup-content");
    var i;
    for (i = 0; i < dropups.length; i++) {
      var openDropup = dropups[i];
      if (openDropup.classList.contains('show')) {
        openDropup.classList.remove('show');
      }
    }
  }
}



