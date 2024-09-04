function onText(text)
{
    const erroreNomeUtente = document.querySelector('#ErroreUser');
    erroreNomeUtente.innerHTML = '';
    if(text == 0){
        console.log(text);
        erroreNomeUtente.innerHTML = 'Nome utente non disponibile';
        event.preventDefault();
    }
}

function onResponse(response){
    return response.json();
}



function validazioneSignUp(event){    
    const errorePassword = document.querySelector('#ErrorePassword');
    const erroreMail = document.querySelector('#ErroreMail');
    errorePassword.innerHTML = '';
    erroreMail.innerHTML = '';
    if(signUp.nomeUtente.value.length == 0 || signUp.password.value.length == 0 || signUp.nome.value.length == 0 || 
        signUp.cognome.value.length == 0 || signUp.email.value.length == 0 || signUp.confPassword.value.length == 0 || signUp.immagine.value.length == 0){
        alert("Compila tutti i campi");
        event.preventDefault();
    }

    if(signUp.password.value != signUp.password_confirmation.value){
        errorePassword.innerHTML = 'Le password non coincidono';
        event.preventDefault();
    }

    if(signUp.email.value.indexOf('@') == -1){
        erroreMail.innerHTML = 'Email non valida';
        event.preventDefault();
    }
}


function checkSignup(event){
    
    var token = document.querySelector("meta[name='csrf-token']").getAttribute("content");
    
    inserito = event.currentTarget.value
    
    const formData = new FormData();
    formData.append('send', inserito)
    formData.append('_token', token);
    fetch(event.currentTarget.getAttribute('verifyNomeUtente'), {method:'POST', body:formData}).then(onResponse).then(onText)
}


var inserito;
const signUp = document.querySelector('#registrazione');
const username = document.querySelector('label input[name=nomeUtente]');
var testo;
signUp.addEventListener('submit', validazioneSignUp);
username.addEventListener('blur', checkSignup);


 