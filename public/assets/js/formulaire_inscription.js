// -------------------------------------------------------------------------------------
//            Validation du formulaire de contact coté utilisateur
// -------------------------------------------------------------------------------------

let nom = document.getElementById('nom_utilisateur');
let prenom = document.getElementById('prenom_utilisateur');
let mail = document.getElementById('mail_utilisateur');
let tel = document.getElementById('tel_utilisateur');
let condition = document.getElementById('legal');
let conditionLabel = document.getElementById('condition_label');
let codeTest = document.getElementById('captcha');
let envoyer = document.querySelector('input[type=submit]');
let mdp1 = document.getElementById('mdp_utilisateur');
let mdp2 = document.getElementById('mdp_check');

if (typeof nom.value != 'undefined') {
    var validationNom = true;
}
else {
    var validationNom = false;
}
if (typeof prenom.value != 'undefined') {
    var validationPrenom = true;
}
else {
    var validationPrenom = false;
}
if (typeof mail.value != 'undefined') {
    var validationMail = true;
}
else {
    var validationMail = false;
}
if (typeof tel.value != 'undefined') {
    var validationTel = true;
}
else {
    var validationTel = false;
}

let validationCondition = false;
let validationCaptcha = false;
let validation = false;
let validationMdp = false;

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
// test longueur input nom
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
// test checkbox condition
function boxcheck(elementTester) {
    if (elementTester.checked) {
        validationCondition = true;
        conditionLabel.style.backgroundColor = "transparent";
    }
    else {
        validationCondition = false;
        conditionLabel.style.backgroundColor = "var(--or50)";
    }
    return validationCondition;
}
//test mdp
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
// addEventListeners
// -----------------------------------------------------
mdp2.addEventListener('blur', function() {
    mdpCheck(mdp1, mdp2, 5);
    validationMdp = validation;
});
nom.addEventListener('blur', function() {
    lengthcheck(nom, 2);
    validationNom = validation;
});
prenom.addEventListener('blur', function() {
    lengthcheck(prenom, 2);
    validationPrenom = validation;
});
mail.addEventListener('blur', function() {
    mailTest(mail);
});
tel.addEventListener('blur', function(){
    lengthcheck(tel, 10);
    validationTel = validation;
});
codeTest.addEventListener('blur', function(){
    captchaTest(codeTest);
});
document.addEventListener('click', function() {
    boxcheck(condition);
    
    if (validationCaptcha === true 
        && validationNom === true 
        && validationPrenom === true
        && validationMail === true
        && validationTel === true
        && validationMdp === true
        && validationCondition === true
        ) {
        envoyer.disabled = false;

    }
    else {
        envoyer.disabled = true;
    }
});