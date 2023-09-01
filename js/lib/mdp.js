// afficher le mot de passe
let pass = document.getElementById("password");
let btnEye = document.getElementById("eye");

btnEye.addEventListener("click", () => {
    if(pass.type == 'password'){
        pass.type = 'text'
        btnEye.src = './assets/affiche.png'
    }else if(pass.type == 'text'){
        pass.type = 'password'
        btnEye.src = './assets/masque.png'
    }
})
