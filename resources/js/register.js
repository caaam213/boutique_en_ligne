function checkEmail() {
    //Email
    var email = document.getElementsByName("email")[0].value;
    var reEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!email.match(reEmail)) {
        document.getElementById("error_email").innerHTML = "Format incorrect ou rien n'a été saisi";
    } else {
        document.getElementById("error_email").innerHTML = "";
    }
    enableButton();
}

function checkPhone() {
    //Phone number
    var numTel = document.getElementsByName("phone")[0].value;
    var reNumTel = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    if (!numTel.match(reNumTel)) {
        document.getElementById("error_phone").innerHTML = "Format incorrect ou rien n'a été saisi";
    } else {
        document.getElementById("error_phone").innerHTML = "";
    }
    enableButton();
}

function checkPostCode() {
    //postcode
    var postcode = document.getElementsByName("postcode")[0].value;
    var rePost = /^(([0-8][0-9])|(9[0-5]))[0-9]{3}$/;
    if (!postcode.match(rePost)) {
        document.getElementById("error_postcode").innerHTML = "Format incorrect ou rien n'a été saisi";
    } else {
        document.getElementById("error_postcode").innerHTML = "";
    }
    enableButton();
}

function verifyPassword() {
    var password = document.getElementById("password");

    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if (!password.value.match(lowerCaseLetters)) {
        document.getElementById("mdp_error").innerHTML = "Au moins un petit caractère est requis";
    }
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if (!password.value.match(upperCaseLetters)) {
        document.getElementById("mdp_error").innerHTML = "Au moins un grand caractère est requis";
    }
    // Validate numbers
    var numbers = /[0-9]/g;
    if (!password.value.match(numbers)) {
        document.getElementById("mdp_error").innerHTML = "Au moins un nombre est requis";
    }

    // Validate length
    if (password.value.length < 8) {
        document.getElementById("mdp_error").innerHTML = "Le mot de passe doit avoir au moins 8 caractères";
    }

    if (password.value.match(lowerCaseLetters) && password.value.match(upperCaseLetters) && password.value.match(numbers) && password.value.length >= 8) {
        document.getElementById("mdp_error").innerHTML = "";
    }
    enableButton();
}

function compare() {
    var password = document.getElementById("password");
    var password2 = document.getElementById("password2");

    if (password.value == password2.value) {
        document.getElementById("mdp2_error").innerHTML = "";
        enableButton();
    } else {
        console.log("efe");
        document.getElementById("mdp2_error").innerHTML = "Les mots de passes sont différents";
        document.getElementsByName("register")[0].disabled = true;
        document.getElementById("information").innerHTML = "Certaines informations sont incorrectes. Vous ne pouvez pas valider.";
        document.getElementById("information").style.color = "#ff5964;";
    }


}

function enableButton() {

    var password = document.getElementById("password");
    var password2 = document.getElementById("password2");
    var lowerCaseLetters = /[a-z]/g;
    var upperCaseLetters = /[A-Z]/g;
    var numbers = /[0-9]/g;
    var mdpOk = 0;
    var identical = 0;

    if (password.value.match(lowerCaseLetters) && password.value.match(upperCaseLetters) && password.value.match(numbers) && password.value.length >= 8) {
        mdpOk = 1;
    }

    if (password.value == password2.value) {
        console.log("edf");
        identical = 1;
    } else {
        identical = 0;
    }

    var numTel = document.getElementsByName("phone")[0].value;
    var reNumTel = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    var email = document.getElementsByName("email")[0].value;
    var reEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var postcode = document.getElementsByName("postcode")[0].value;
    var rePost = /^(([0-8][0-9])|(9[0-5]))[0-9]{3}$/;

    if (postcode.match(rePost) && email.match(reEmail) && numTel.match(reNumTel) && mdpOk == 1 && identical == 1) {
        document.getElementsByName("register")[0].disabled = false;
        document.getElementById("information").innerHTML = "Tout est bon, vous pouvez valider :)";
        document.getElementById("information").style.color = "#28b78d";
    } else {
        document.getElementsByName("register")[0].disabled = true;
        document.getElementById("information").innerHTML = "Certaines informations sont incorrectes. Vous ne pouvez pas valider.";
        document.getElementById("information").style.color = "#ff5964;";
    }
}