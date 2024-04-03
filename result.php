<?php
   if ($_POST['depart'] == '' && $_POST['arrive'] == '') {
     header('Location: index.php');
   }
    ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="styles.css" />
      <link rel="icon" href="./img/favicon.ico" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
      <title>FranceMaps</title>
   </head>
   <body>
      <div class="bg animate__animated animate__fadeIn"></div>
      <a href="https://theo-loic.alwaysdata.net/admin/" class="index10">
         <div class="topcorner animate__animated animate__fadeIn animate__delay-1s"></div>
      </a>
      <header class="flex-header"></header>
      <main class="flex-main">
        <!-- Permet de faire affiché les cookies si il existe -->
         <?php
            if(!isset($_COOKIE["départ"])) {echo "";} else{
              if(!isset($_POST['depart'])) {$_POST['depart'] = $_COOKIE["départ"];}
            }

            if(!isset($_COOKIE["arrivé"])) {echo "";} else {
              if(!isset($_POST['arrive'])) {$_POST['arrive'] = $_COOKIE["arrivé"];}
            }
          ?>
         <article class="flex-article">
             <!-- crée une div avec la class rect et l'appelle des class d'une librarie -->
            <div id="PremierRect" class="rect animate__animated animate__fadeIn animate__delay-1s">
               <img src="./img/destination.png" class="entete" alt="" />
               <h1>FRANCEMAPS</h1>
               <h2>
                  Voici votre resultat pour votre recherche de <i><?php echo strtoupper($_POST['depart']); ?></i> à <i><?php echo strtoupper($_POST['arrive']); ?></i>.<br/>
                  👇 <u>Votre itinéraire :</u> 👇
               </h2>
               <div class="steps-bar">
                  <ul class="steps-indicator">
                     <!-- Initialise le bon format de ville de départ & d'arrivé et execute le script python avec les valeurs de ville de départ et d'arrivé  -->
                     <?php
                        $var1 = ucfirst(strtolower(strtoupper($_POST['depart'])));
                        $var2 = ucfirst(strtolower(strtoupper($_POST['arrive'])));
                        setcookie("départ", $var1, time() + (86400 * 30), "/");
                        setcookie("arrivé", $var2, time() + (86400 * 30), "/");
                        $result = exec("python3 ./script.py 2>&1 $var1 $var2");
                        echo $result;
                      ?>
                  </ul>
               </div>
            </div>
         </article>
      </main>
      <footer class="flex-footer"></footer>
   </body>
</html>
