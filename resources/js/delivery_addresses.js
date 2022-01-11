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

function checkPostCodeOnly() {
    var postcode = document.getElementsByName("postcode")[0].value;
    var rePost = /^(([0-8][0-9])|(9[0-5]))[0-9]{3}$/;
    if (postcode.match(rePost)) {
        document.getElementsByName("addAddressForm")[0].disabled = false;
        document.getElementById("information").innerHTML = "Tout est bon, vous pouvez valider :)";
        document.getElementById("information").style.color = "#28b78d";
    } else {
        document.getElementsByName("addAddressForm")[0].disabled = true;
        document.getElementById("information").innerHTML = "Le format du code postal est incorrect ou vide";
        document.getElementById("information").style.color = "#ff5964;";
    }
}

function enableButton() {
    var numTel = document.getElementsByName("phone")[0].value;
    var reNumTel = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    var email = document.getElementsByName("email")[0].value;
    var reEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var postcode = document.getElementsByName("postcode")[0].value;
    var rePost = /^(([0-8][0-9])|(9[0-5]))[0-9]{3}$/;

    if (postcode.match(rePost) && email.match(reEmail) && numTel.match(reNumTel)) {
        document.getElementsByName("addAddressForm")[0].disabled = false;
        document.getElementById("information").innerHTML = "Tout est bon, vous pouvez valider :)";
        document.getElementById("information").style.color = "#28b78d";
    } else {
        document.getElementsByName("addAddressForm")[0].disabled = true;
        document.getElementById("information").innerHTML = "Certaines informations sont incorrectes. Vous ne pouvez pas valider.";
        document.getElementById("information").style.color = "#ff5964;";
    }
}