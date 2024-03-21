// -------------------------------------------------------------------------------------
//            Validation du formulaire devis coté utilisateur
// -------------------------------------------------------------------------------------

let nom = document.getElementById('nom_utilisateur');
let prenom = document.getElementById('prenom_utilisateur');
let mail = document.getElementById('mail_utilisateur');
let tel = document.getElementById('tel_utilisateur');
let evenement = document.getElementsByName('type_evenement_devis');
let evenementBox = document.getElementById('evenement_box');
let repas = document.getElementsByName('type_repas_devis');
let repasBox = document.getElementById('repas_box');
let nombre = document.getElementById('nbr_personnes_devis');
let date = document.getElementById('date_evenement_devis');
let condition = document.getElementById('legal');
let conditionLabel = document.getElementById('condition_label');
let codeTest = document.getElementById('captcha');
let envoyer = document.querySelector('input[type=submit]');
let mdp1 = document.getElementById('mdp_utilisateur');
let mdp2 = document.getElementById('mdp_check');
let mdpTest = document.getElementById('mdp_test');

if (mdpTest.value === 0) {
    var validationMdp = false;
    var validationNom = false;
    var validationPrenom = false;
    var validationMail = false;
    var validationTel = false;
}
else {
    var validationMdp = true;
    var validationNom = true;
    var validationPrenom = true;
    var validationMail = true;
    var validationTel = true;
}
if (typeof evenement.value != 'undefined') {
    var validationEvenement = true;
}
else {
    var validationEvenement = false;
}
if (typeof repas.value != 'undefined') {
    var validationRepas = true;
}
else {
    var validationRepas = false;
}
if (typeof nombre.value != 'undefined') {
    var validationNombre = true;
}
else {
    var validationNombre = false;
}
if (typeof date.value != 'undefined') {
    var validationDate = true;
}
else {
    var validationDate = false;
}

let validationCondition = false;
let validationCaptcha = false;
let validation = false;

// -----------------------------------------------------
// fonctions
// -----------------------------------------------------
// identification du résultat captcha
function captchaTest(codeTest) {
    if (codeTest.value === chaineNumberCode) {
        validationCaptcha = true;
        codeTest.style.backgroundColor = "transparent";
    }
    else {
        validationCaptcha = false;
        codeTest.style.backgroundColor = "var(--or50)";
    }
    return validationCaptcha;
}
// mail
function validateEmail(email) {
    let res = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    return res.test(email);
}

function mailTest(mail) {
    if (validateEmail(mail.value)) {
        validationMail = true;
        mail.style.backgroundColor = "transparent";
    }
    else {
        mail.placeholder = mail.value + " adresse non valide";
        mail.value = '';
        mail.style.backgroundColor = "var(--or50)";
        validationMail = false;
    }
    return validationMail;
}
// test longueur input 
function lengthcheck(elementTester, minimum) {
    if (elementTester.value.length < minimum) {
        elementTester.value = '';
        elementTester.placeholder = minimum + ' caractères minimum';
        elementTester.style.backgroundColor = "var(--or50)";
        validation = false;
    }
    else {
        validation = true;
        elementTester.style.backgroundColor = "transparent";
    }
    return validation;
}
// test checkbox et radio
function boxcheck(elementTester) {
    if (elementTester.checked) {
        validation = true;
    }
    else {
        validation = false;
    }
    return validation;
}

// test nombre
function numbercheck(elementTester, min, max) {
    if (parseInt(elementTester.value) >= min && parseInt(elementTester.value) <= max) {
        validation = true;
        elementTester.style.backgroundColor = "transparent";
    }
    else {
        validation = false;
        elementTester.value = '';
        elementTester.placeholder = 'Entre ' + min + ' et ' + max;
        elementTester.style.backgroundColor = "var(--or50)";
    }
    return validation;
}
//test_mdp
function mdpCheck(elementTester,elementControl, minimum) {
    // 1 majuscule, 1 minucule, 1 chiffre, 1 caractère spécial, et un minimum de caractère
    // plus l'élément est égal au control
   if (elementTester.value.length >= minimum 
       && elementTester.value.match(/[0-9]/g) 
       && elementTester.value.match(/[A-Z]/g)
       && elementTester.value.match(/[a-z]/g)
       && elementTester.value.match(/[^a-zA-Z\d]/g)
       && elementTester.value == elementControl.value) {
       validation = true;
       elementTester.style.backgroundColor = "transparent";
       elementControl.style.backgroundColor = "transparent";
   }
   else  {
       elementTester.value = '';
       elementControl.value = '';
       elementTester.placeholder = minimum + ' caractères minimum';
       elementTester.style.backgroundColor = "var(--or50)";
       elementControl.style.backgroundColor = "var(--or50)";
       validation = false;
   }
   return validation;
}
// -----------------------------------------------------
//                 addEventListeners
// -----------------------------------------------------
mdp2.addEventListener('blur', function() {
    mdpCheck(mdp1, mdp2, 5);
    validationMdp = validation;
});

nom.addEventListener('blur', function() {
    // nom
    lengthcheck(nom, 2);
    validationNom = validation;
});
prenom.addEventListener('blur', function() {
    // prenom
    lengthcheck(prenom, 2);
    validationPrenom = validation;
});
mail.addEventListener('blur', function() {
    // mail
    mailTest(mail);
});
tel.addEventListener('blur', function() {
    // telephone
    lengthcheck(tel, 10);
    validationTel = validation;
});
nombre.addEventListener('blur', function() {
    // nombre
    numbercheck(nombre, 10, 500);
    validationNombre = validation;
});
date.addEventListener('blur', function() {
    //date
    lengthcheck(date,1);
    validationDate = validation;
});
codeTest.addEventListener('blur', function() {
    //captcha
    captchaTest(codeTest);
});
document.addEventListener('click', function() {
    // evenement
    for (let i = 0; i < evenement.length; i++) {
        boxcheck(evenement[i]);
        if (validation === true) {
            validationEvenement = validation;
            break;
        }
        else {
            evenementBox.style.backgroundColor = "var(--or50)";
        }
    }
    if (validationEvenement === true) {
        evenementBox.style.backgroundColor = "transparent";
    }
    // repas
    for (let i = 0; i < repas.length; i++) {
        boxcheck(repas[i]);
        if (validation === true) {
            validationRepas = validation;
            break;
        }
        else {
            repasBox.style.backgroundColor = "var(--or50)";
        }
    }
    if (validationRepas === true) {
        repasBox.style.backgroundColor = "transparent";
    }
    // conditions 
    boxcheck(condition);
    validationCondition = validation;
    if (validation === true) {
        conditionLabel.style.backgroundColor = "transparent";
    }
    else {
        conditionLabel.style.backgroundColor = "var(--or50)";
    }

  
    if (validationCaptcha === true 
        && validationNom === true 
        && validationPrenom === true
        && validationMail === true
        && validationTel == true
        && validationEvenement === true
        && validationRepas === true
        && validationNombre === true
        && validationDate === true
        && validationMdp === true
        && validationCondition === true
        ) {
            envoyer.disabled = false;

    }
    else {
        envoyer.disabled = true;
    }
});

// --------------------------------------------------------------------------------------------
//                               Control de la case type de repas
//                si plat à l'assiette cochée affiche le massage sur les menus entreprises
// --------------------------------------------------------------------------------------------

let box_assiettes = document.getElementById('assiettes');

// affichage 
for (let i = 0; i < repas.length; i++ ){
    repas[i].addEventListener('click', function () {
        if (repas[2].checked) {
            box_assiettes.classList.remove('d-none');
            box_assiettes.classList.add('d-block');
        }
        else {
            box_assiettes.classList.remove('d-block');
            box_assiettes.classList.add('d-none');
        }
    });
}


