<!DOCTYPE html>

<html>

<head>

   <title>Réservations</title>

   <link rel="stylesheet" href="">



   <meta charset="utf-8" />

   <style>
      body {

         background: #c0bfbf;

         margin: 0;

         padding: 0;

         width: 100%;


      }

      * {

         font-family: arial;

      }

      body {

         margin: 20px;

      }

      a {

         color: #EE6600;

         text-decoration: none;
      }

      a:hover {

         text-decoration: underline;

      }
   </style>

</head>

<body onLoad="document.fo.login.focus()">

   <?php

   try {

      // On se connecte à MySQL

      $bdd = new PDO('mysql:host=localhost;dbname=resto_database', 'root', '');
   } catch (Exception $e) {

      // En cas d'erreur, on affiche un message et on arrête tout

      die('Erreur : ' . $e->getMessage());
   }

   // Si tout va bien, on peut continuer

   // On récupère tout le contenu de la table reservation et dans l'ordre ascendant
   $reponse = $bdd->query('SELECT * FROM reservation ORDER BY dates,heures');


   // On affiche chaque entrée une à une

   while ($donnees = $reponse->fetch()) {

   ?>

      <p>

         Réservation de <strong><?php echo $donnees['nom']; ?> <?php echo $donnees['prenom']; ?></strong>, .<br />

         Pour le<?php echo $donnees['dates']; ?> à <?php echo $donnees['heures']; ?> pour

         <?php echo $donnees['nombres']; ?> personnes.</em>

      </p>

   <?php

   }
   $reponse->closeCursor(); // Termine le traitement de la requête


   ?>

   [ <a href="deconnexion.php">Se déconnecter</a> ]<br>

   [ <a href="../carteEtMenu/pageModif.php">La carte</a> ]<br>

   [ <a href="../photos/pagePhotos.php">les photos</a> ]<br>

   [ <a href="../carteEtMenu/pageMenu.php">Le menu</a> ]

</body>

</html>