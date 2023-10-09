
// defilement vers le haut avec flèche
const btn = document.querySelector('.button-up')

btn.addEventListener('click', () => {

    window.scrollTo({
        top:0,
        left:0,
        behavior: "smooth",
        })
})

//Formulaire js regex
(function () {
    'use strict'

    //déclaration form
    let form = document.querySelector('#form-contact');

    form.addEventListener('submit', function (event) {
        Array.form(form.elements).forEach((input) => {
            if(input.type !== 'submit'){
                if(!validateField(input)){
                    event.preventDefault();
                    event.stopPropagation();
                    input.classList.remove('is-valid');
                    input.classList.add('is-invalid');
                    input.nextElementSibling.style.display = "block";
                }
                else{
                    input.nextElementSibling.style.display = "none";
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                }
            }
        })
    }, false);
})()



//validation d'un champ required
function validateRequired(input){
    return !(input.value == null || input.value == "");
}

function validateField(input){
    let fieldName = input.name;
    if(fieldName == "lastname"){
        if(!validateRequired(input)){
            return false;
        }
        return true;
    }
}

