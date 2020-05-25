
// A $( document ).ready() block.
document.addEventListener("DOMContentLoaded", function(event) {// clock

// mobile menu
$('.sidenav').sidenav();

//modal
$('.modal').modal();

let today = new Date();
let dd = today.getDate();
let mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
let hh = today.getHours();
let min = today.getMinutes();

  if (dd < 10) {
    dd = '0' + dd;
  } 
  if (mm < 10) {
    mm = '0' + mm;
  }
  let todayPointage = yyyy + '/' + mm + '/' + dd;



let options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 0
};
var crd;
function success(pos) {
    return crd = pos.coords;
}

function error(err) {
  console.warn(`ERREUR (${err.code}): ${err.message}`);
}

navigator.geolocation.getCurrentPosition(success, error, options);


//vérification de l'état de connection de l'utilisateur

firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in.
    console.log('connecté');
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
    function iAmHere(){
      // pointage

      let onTimeTime = new Date().toLocaleString(); //date est transformé en chaîne de caractères

      //geolocation
      function maPosition(position) {
        var infopos = "Position déterminée :\n";
        infopos += "Latitude : "+position.coords.latitude +"\n";
        infopos += "Longitude: "+position.coords.longitude+"\n";
        infopos += "Altitude : "+position.coords.altitude +"\n";
       //console.log(infopos);
      }


      let geolocation = navigator.geolocation.getCurrentPosition(maPosition);
      //console.log(geolocation);



        //console.log(today);
        let uid = user.uid;
        let pointage = {
          uid : uid,
          time: onTimeTime,
          email : user.email
        }
        console.log(pointage);
        firebase.database().ref('/' + todayPointage + '/' + uid + '/').set(pointage);

    }

    document.getElementById('onTime').addEventListener('click', function(event) {
      checkIfUserAlreadySignedIn(user.uid, todayPointage);
      event.preventDefault();
    });

    function checkIfUserAlreadySignedIn(userId, datePath) {
      firebase.database().ref(datePath + '/' + userId).once('value', (data) => {
        if (data.val()) { //cela revient à écrire (data.val !== null)
          alert("Vous avez déjà émargé");
        } else {
          iAmHere();
        }
      });
    }

    // ...
  } else {
    // User is signed out.
    // ...
    console.log('déconnecté');
    window.location = './signin.html';//redirection vers la page index.html
  }
});

//signOut

$('#signOut').click(()=>{
  firebase.auth().signOut().then(function() {
    // Sign-out successful.
    
  }).catch(function(error) {
    // An error happened.
  });
});


}); //fin de document ready


