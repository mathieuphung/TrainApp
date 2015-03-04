window.onload = function(){
    document.forms['form'].elements[0].focus();


}

function checkForm(){
    var form = document.forms['form'],
        checkRadio = false,
        retour = true,
        errorMsg = "";
    var reGex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    console.log(form.elements['login'].value.length);
    if (form.elements['login'].value.length > 4) {

    }else{
        retour = false;
        errorMsg += "Pseudo trop court! 4 caractères min.<br>";
    }

    if(reGex.test(form.elements['mail'].value)){

    }else{
        retour = false;
        errorMsg += "Veuillez entrer une adresse mail valide.<br>";
    }

    if (form.elements['password'].value.length > 6) {

    }else{
        retour = false;
        errorMsg += "Password trop court! 6 caractères minimums exigés.<br>";
    }

    if (form.elements['password'].value === form.elements['password_check'].value) {

    }else{
        retour = false;
        errorMsg += "Mots de passe différents<br>";
    }

    // traitement renvoi

    if (errorMsg.length > 0) {
        console.log(document.getElementsByName('Warning'));
        document.getElementsByName('Warning')[0].style.visibility= 'visible';
        document.getElementsByName('Warning')[0].innerHTML = errorMsg;
    };

    return retour;

}