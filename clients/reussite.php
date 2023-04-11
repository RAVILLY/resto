<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:reservation.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour Madame, Monsieur. " .
      $_SESSION["prenomNom"].
      " votre demande a bien été prise en compte. A bientôt .<br> l'équipe du Quai Antique";
   else
      $bienvenue="Bonsoir Madame, Monsieur. ".
      $_SESSION["prenomNom"].
      " votre demande a bien été prise en compte. A bientôt .<br> l'équipe du Quai Antique";
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <style>
         *{
            font-family:arial;
         }
         body{
            margin:20px;
         }
         a{
            color:#EE6600;
            text-decoration:none;
         }
         a:hover{
            text-decoration:underline;
         }
      </style>
   </head>
   <body onLoad="document.fo.login.focus()">
      <h2><?php echo $bienvenue?></h2>
      [ <a href="deconnexion.php">Se déconnecter</a> ]
   </body>
</html> 
