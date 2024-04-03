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
         session_start();
         
         // se connecter
         if (isset($_POST['username'])){
           $username = stripslashes($_REQUEST['username']);
           $username = mysqli_real_escape_string($conn, $username);
           $password = stripslashes($_REQUEST['password']);
           $password = mysqli_real_escape_string($conn, $password);
             $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
           $result = mysqli_query($conn,$query);
           $rows = mysqli_num_rows($result);
           if($rows==1){
               $_SESSION['username'] = $username;
               header("Location: index.php");
           }else{
             $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
           }
         }
         ?>
      <div id="PremierRect" class="rect animate__animated animate__fadeIn animate__delay-1s">
         <img id="img" src="../img/destination.png" class="entete" alt="" />
         <form method="post" name="login">
            <h1 class="box-title">ADMINISTRATION</h1>
            <input type="text" name="username" placeholder="Nom d'utilisateur">
            <input type="password" name="password" placeholder="Mot de passe">
            <input type="submit" value="Connexion " name="submit" class="box-button">
            <p class="box-register">INSCRIPTION : <a href="register.php"><u>ICI</u></a></p>
            <?php if (! empty($message)) { ?>
            <p class="errorMessage"><?php echo $message; ?></p>
            <?php } ?>
         </form>
      </div>
   </body>
</html>
