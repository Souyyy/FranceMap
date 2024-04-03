<?php
   // Initialiser la session
   session_start();
   // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
   if(!isset($_SESSION["username"])){
     header("Location: login.php");
     exit();
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="../styles.css" />
      <link rel="stylesheet" href="style.css" />
      <link rel="icon" href="../img/favicon.ico" />
      <title><?php echo $_SESSION['username'];?> - FranceMaps</title>
   </head>
   <body>
     <br><br>
         <h1 style="color:white">Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
         <br>
         <form name="formulaire" method="post">
            <textarea id="story" name="story" rows="25" cols="150"><?php
              //pour afficher le fichier FRANCE.MAP dans le textarea
               if(file_exists("../FRANCE.MAP"))
               {
               $fp = fopen("../FRANCE.MAP", "r+");
               while (!feof($fp))
               {
               $buffer = fgets($fp, 4096);
               echo $buffer;
               }
               fclose($fp);
               }
               ?></textarea><br>
            <input type="submit" id="button" name="delete" value="Sauvegarder"/>
         </form>
         <?php
            // suprimer le fichier FRANCE.MAP
            if(isset($_POST['delete'])){
            	unlink("../FRANCE.MAP");
            }

            // récupérer le textarea
            if(isset($_POST['story'])){
            	$requete = $_POST['story'];
            	// création du nouveau fichier FRANCE.MAP
            	$f = fopen('../FRANCE.MAP', "x+");
            	fwrite($f, $requete );
            	fclose($f);
            	header("Refresh:0");
            }

            // suprimer le fichier ville et voisinage
            if(isset($_POST['delete'])){
            	unlink("../ville_et_voisinage.json");
            }
            // on réexecute le script
            exec("python3 ./dictionnaire.py 2>&1");
            ?>
         <footer><a class="deco" href="logout.php">DÉCONNEXION</a></footer>
   </body>
</html>
