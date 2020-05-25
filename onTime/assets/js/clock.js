document.addEventListener("DOMContentLoaded", function(event) {// clock




function startTime() {
  var today = new Date()
  var tab_jour= new Array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");

  var jour = tab_jour[today.getDay()];
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);

//console.log(typeof h);
  if(h > 09){
    //alert('late');
    $('#clockdiv > div').addClass( "redClass" );
    $('#clockdiv div > span').addClass( "pinkClass" );
    
  }
  document.getElementById('days').innerHTML = jour;
  document.getElementById('hours').innerHTML = h;
  document.getElementById('minutes').innerHTML = m;
  document.getElementById('seconds').innerHTML = s;


  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
startTime();




 });//fin de window.onload
