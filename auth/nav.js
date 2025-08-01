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
