//TOUT CE CODE PERMET DE FAIRE DISPARAITRE LE BOUTON DE RECHERCHE DE LINDEX AVEC UNE ANIMATION DE FADEOUT
var elem = document.getElementById('PremierRect'),fadeInInterval,fadeOutInterval;

function hide() {
  var depart = document.getElementById("depart").value;
  var arrive = document.getElementById("arrive").value;
  if (depart != '' && arrive != '') {
    var element1 = document.getElementById("button");
    element1.className = "animate__animated animate__fadeOut";
    document.getElementById( 'animation' ).style.visibility = "visible";

    clearInterval(fadeInInterval);
    clearInterval(fadeOutInterval);
    elem.fadeOut = function(timing) {
      var newValue = 1;
      elem.style.opacity = 1;
      fadeOutInterval = setInterval(function(){
        if (newValue > 0) {
          newValue -= 0.01;
        } else if (newValue < 0) {
          elem.style.opacity = 0;
          elem.style.display = 'none';
          clearInterval(fadeOutInterval);
        }
        elem.style.opacity = newValue;
      }, timing);
    }
    elem.fadeOut(10);
  }
}
