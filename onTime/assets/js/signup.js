
// A $( document ).ready() block.
document.addEventListener("DOMContentLoaded", function(event) {// clock

// mobile menu
$('.sidenav').sidenav();

//signOut

$('#signOut').click(()=>{
  firebase.auth().signOut().then(function() {
    // Sign-out successful.

  }).catch(function(error) {
    // An error happened.
  });
});



//vérifie l'état de connection de l'utilisateur

firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in.
    console.log('connecté');
    window.location = './index.html';//redirection vers la page index.html
  } else {
    // No user is signed in.
    console.log('déconnecté');
//fonction d'inscription
$('#signUp').click(()=>{
  let email = $('#email').val();
  let password = $('#password').val();
  let password2 = $('#password2').val();

  if(password == password2){//si les 2 champs password et password2 sont identique
    firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // ...
    }).then(()=>{//après l'inscription résussie
      window.location = './index.html';//redirection vers la page index.html
    });

  }else{
    alert('les mots de passe ne correspondent pas');
  }
});

      } //fin du premier else
});//fin de onAuth

}); //fin de document ready


