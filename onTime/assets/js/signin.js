
// A $( document ).ready() block.
document.addEventListener("DOMContentLoaded", function(event) {// clock

// mobile menu
$('.sidenav').sidenav();



//vérifie l'état de connection de l'utilisateur

firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in.
    console.log('connecté');
    window.location = './index.html';//redirection vers la page index.html
  } else {
    // No user is signed in.
    console.log('déconnecté');
    //fonction de login
    $('#signIn').click(()=>{
      let email = $('#email').val();
      let password = $('#password').val();
      let password2 = $('#password2').val();

      firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // ...
      });
    });
      }
});//fin de onAuth







}); //fin de document ready


