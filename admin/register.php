<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="style.css" />
      <link rel="stylesheet" href="../styles.css" />
      <link rel="icon" href="../img/favicon.ico" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
      <title>ADMIN - FranceMaps</title>
   </head>
   <body>
      <?php
         require('config.php');
         if (isset($_REQUEST['username'], $_REQUEST['password'])){
           // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
           $username = stripslashes($_REQUEST['username']);
           $username = mysqli_real_escape_string($conn, $username);
           // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
           $password = stripslashes($_REQUEST['password']);
           $password = mysqli_real_escape_string($conn, $password);
           //requéte SQL + mot de passe crypté
             $query = "INSERT into `users` (username, password)
                       VALUES ('$username', '".hash('sha256', $password)."')";
           // Exécuter la requête sur la base de données
             $res = mysqli_query($conn, $query);
             if($res){
                echo "<div class='rect animate__animated animate__fadeIn animate__delay-1s'>
                      <h3>Vous vous êtes inscrit avec succès.</h3>
                      <a href='login.php'><button type='submit' id='button' name='submit'>CONNEXION</button></a>
                </div>";
             }
         }else{
         ?>
      <div id="PremierRect" class="rect animate__animated animate__fadeIn animate__delay-1s">
         <img id="img" src="../img/destination.png" class="entete" alt="" />
         <form method="post">
            <h1 class="box-title">INSCRIPTION</h1>
            <input type="text" name="username" placeholder="Nom d'utilisateur">
            <input type="password" name="password" placeholder="Mot de passe">
            <input type="submit" name="submit" value="S'inscrire" class="box-button" />
            <p class="box-register">DEJA INCRIT CLIQUE : <a href="login.php"><u>ICI</u></a></p>
         </form>
      </div>
      <?php } ?>
   </body>
</html>
