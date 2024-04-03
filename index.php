<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="styles.css" />
        <link rel="icon" href="./img/favicon.ico" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <script src="./main.js"></script>
        <title>FranceMaps</title>
    </head>
    <body>
      <!-- crée une div ou serra affiché le cadenas en haut de l'ecran pour aller dans la partie admin -->
        <div class="bg animate__animated animate__fadeIn"></div>
        <a href="https://theo-loic.alwaysdata.net/admin/" class="index10">
            <div class="topcorner animate__animated animate__fadeIn animate__delay-1s"></div>
        </a>
        <header class="flex-header"></header>
        <main class="flex-main">
            <article class="flex-article">
              <!-- crée une div avec la class rect et l'appelle des class d'une librarie -->
                <div id="PremierRect" class="rect animate__animated animate__fadeIn animate__delay-1s">
                    <img id="img" src="./img/destination.png" class="entete" alt="" />
                    <!-- form input pour saisir sa ville d'arrivé et de départ avec le bouton submit-->
                    <form id="form" action="result.php" method="post">
                        <h1>FRANCEMAPS</h1>
                        <h2>
                            Trouver le trajet idéale pour tout vos déplacement<br />
                            Grâce à FranceMaps.
                        </h2>
                        <input type="text" id="depart" name="depart" placeholder="Ville de départ" value="<?php if(!isset($_COOKIE["départ"])) {echo "";} else {echo $_COOKIE["départ"];}?>"required/>
                        <input type="text" id="arrive" name="arrive" placeholder="Ville d'arrivé" value="<?php if(!isset($_COOKIE["arrivé"])) {echo "";} else {echo $_COOKIE["arrivé"];}?>"required />
                        <div class="loading" id="animation" style="visibility:hidden;"></div>
                        <button type="submit" id="button" name="submit" onclick="hide();">RECHERCHER</button>
                    </form>
                </div>
            </article>
        </main>
        <footer class="flex-footer"></footer>
    </body>
</html>
