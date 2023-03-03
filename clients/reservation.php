<?php
session_start();
if ($_SESSION["autoriser"] != "oui") {
   header("location:enregistrementClient.php");
   exit();
}
if (date("H") < 18)
   $bienvenue = "Bonjour et bienvenue Madame, Monsieur " .
      $_SESSION["prenomNom"] .
      " dans votre espace personnel";
else
   $bienvenue = "Bonsoir et bienvenue Madame, Monsieur " .
      $_SESSION["prenomNom"] .
      " dans votre espace personnel";
?>

<?php
@$nom = $_POST["nom"];
@$prenom = $_POST["prenom"];
@$telephone = $_POST["telephone"];
@$nombres = $_POST["nombres"];
@$dates = $_POST["dates"];
@$heures = $_POST["heures"];
@$valider = $_POST["valider"];
$erreur = "";
if (isset($valider)) {
   if (empty($nom)) $erreur = "Nom laissé vide!";
   elseif (empty($prenom)) $erreur = "Prénom laissé vide!";
   elseif (empty($telephone)) $erreur = "Téléphone laissé vide!";
   elseif (empty($nombres)) $erreur = "places laissé vide!";
   elseif (empty($dates)) $erreur = "Date laissé vide!";
   elseif (empty($heures)) $erreur = "Heures laissé vide!";
   else {
      include("connexion.php");
      $ins = $pdo->prepare('insert into reservation(nom,prenom,telephone,nombres,dates,heures) values(?,?,?,?,?,?)');
      if ($ins->execute(array($nom, $prenom, $telephone, $nombres, $dates, $heures)))
         header("location:reussite.php");
   }
}
?>
<!DOCTYPE html>

<html>

<head>

   <meta charset="utf-8" />

   <style>
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

      input {

         border: solid 1px #2222AA;

         margin-bottom: 10px;

         padding: 16px;

         outline: none;

         border-radius: 6px;

      }

      .erreur {

         color: #CC0000;

         margin-bottom: 10px;

      }
   </style>

</head>

<body onLoad="document.fo.login.focus()">

   <h2><?php echo $bienvenue ?></h2>

   [ <a href="deconnexion.php">Se déconnecter</a> ]

   <h1>Réservations</h1>

   <div class="erreur"><?php echo $erreur ?></div>

   <form name="fo" method="post" action="">

      <input type="text" name="nom" placeholder="Nom"/><br />

      <input type="text" name="prenom" placeholder="Prénom" /><br />

      <input type="text" name="telephone" placeholder="N° téléphone" /><br />

      <input type="int" name="nombres" placeholder="Places" /><br />

      <input id="date" type="date" name="dates"><br>

      <input type="text" name="heures" placeholder="Heures 00:00" /><br />


      <input type="submit" name="valider" value="Enregistrer" />

   </form>

</body>

</html>