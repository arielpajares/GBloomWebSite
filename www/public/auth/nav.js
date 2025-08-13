const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");
const menuBtn = document.getElementById("menu");

if (registerBtn){
    registerBtn.addEventListener("click", () =>{
        window.location = "register.html";
    })
}

if (loginBtn){
    loginBtn.addEventListener("click", () =>{
        window.location = "login.html";
    })
}
if(menuBtn){
    menuBtn.addEventListener("click", ()=>{
        window.location = "../home/index.html";w
    })
}

function togglePassword() {
  const passwordInput = document.getElementById("passwordInput");
  const eyeIcon = document.getElementById("eyeIcon");
  
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    eyeIcon.classList.remove("bi-eye");
    eyeIcon.classList.add("bi-eye-slash");
  } else {
    passwordInput.type = "password";
    eyeIcon.classList.remove("bi-eye-slash");
    eyeIcon.classList.add("bi-eye");
  }
}

const spanInput = document.querySelector(".field span");

spanInput.addEventListener("click", togglePassword);