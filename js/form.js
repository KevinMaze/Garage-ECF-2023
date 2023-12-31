
//////////////////////////////START VALIDATION FORMULAIRE CONTACT/////////////////////////////////////////
(function () {
    'use strict';
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
})();

//validation d'un champ required
function validateRequired(input){
    return !(input.value == null || input.value == "");
}

//Validation du nombre de caractère
function validateLength(input, minLength, maxLength){
    return !(input.value.length < minLength || input.value.length > maxLength);
}

//Validation des caractères LATIN et LETTRE
function validateText(input){
    return input.value.match("^[a-zA-Z\s]+$");
}

//Validation email
function validateEmail(input){
    let EMAIL = input.value;
    let POSAT = EMAIL.indexOf("@");
    let POSDOT = EMAIL.lastIndexOf(".");

    return !(POSAT < 1 || POSDOT - POSAT < 2);
}

//Validation telephone
function validatePhone(input){
    return input.value.match(/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/);
}

function validateField(input){
    let fieldName = input.name;
    //Validation de NOM
    if(fieldName == "lastname"){
        if(!validateRequired(input)){
            return false;
        }
        if(!validateLength(input, 2, 50)){
            return false;
        }
        if(!validateText(input)){
            return false;
        }
        
        return (true);
    }
    //Validation de PRENOM
    if(fieldName == "firstname"){
        if(!validateRequired(input)){
            return false;
        }
        if(!validateLength(input, 2, 50)){
            return false;
        }
        if(!validateText(input)){
            return false;
        }
        return (true);
    }
    //Validation de EMAIL
    if(fieldName == "email"){
        if(!validateRequired(input)){
            return false;
        }
        if(!validateEmail(input)){
            return false;
        }
        return (true);
    }
    //Validation de TELEPHONE
    if(fieldName == "phone"){
        if(!validateRequired(input)){
            return false;
        }
        if(!validatePhone(input)){
            return false;
        }
        return (true);
    }
    //Validation de TEXT
    if(fieldName == "ask"){
        if(!validateRequired(input)){
            return false;
        }
        if(!validateLength(input, 2, 500)){
            return false;
        }
        if(!validateText(input)){
            return false;
        }
        return (true);
    }
}
//////////////////////////////END VALIDATION FORMULAIRE CONTACT/////////////////////////////////////////

///////////////////////////////START VALIDATION FORMULAIRE OPINION//////////////////////////////////////
(function () {
    'use strict';
    //déclaration form
    let formOpinion = document.querySelector('#form-opinion');

    formOpinion.addEventListener('submit', function (event) {
        Array.form(formOpinion.elements).forEach((input) => {
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
})();

//validation d'un champ required
function validateRequired(input){
    return !(input.value == null || input.value == "");
}

function validateField(input){
    let fieldName = input.name;
    if(fieldName == "name"){
        if(!validateRequired(input)){
            return false;
        }
        if(!validateLength(input, 2, 50)){
            return false;
        }
        if(!validateText(input)){
            return false;
        }
        
        return (true);
    }
    if(fieldName == "ask"){
        if(!validateRequired(input)){
            return false;
        }
        if(!validateLength(input, 2, 500)){
            return false;
        }
        if(!validateText(input)){
            return false;
        }
        return (true);
    }
}

function validateText(input){
    return input.value.match("^[a-zA-Z\s]+$");
}

///////////////////////////////END VALIDATION FORMULAIRE OPINION//////////////////////////////////////

