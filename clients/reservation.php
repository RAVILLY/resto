<?php
session_start();
if ($_SESSION["autoriser"] != "oui") {
   header("location:enregistrementClient.php");
   exit();
}
if (date("H") < 18)
   $bienvenue = "Bonjour et bienvenue Madame, monsieur" . 
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

   <title>reservation</title>

   <link rel="stylesheet" href="ClientCss.css">

</head>

<body onLoad="document.fo.login.focus()">

   <h2><?php echo $bienvenue ?></h2>

   [ <a href="deconnexion.php">Se déconnecter</a> ]

   <h1>Réservations</h1>

   <div class="erreur"><?php echo $erreur ?></div>

   <form name="fo" method="post" action="">

      <input type="text" name="nom" placeholder="Nom" /><br />

      <input type="text" name="prenom" placeholder="Prénom" /><br />

      <input type="text" name="telephone" placeholder="N° téléphone" /><br />

      <input type="int" name="nombres" placeholder="Places" /><br />

      <input id="date" type="date" name="dates"><br>

      <select name="heures" id="heures" size="4">

         <optgroup label="MIDI">

            <option value="12:00">12:00</option>

            <option value="12:15">12:15</option>

            <option value="12:30">12:30</option>

            <option value="12:45">12:45</option>

            <option value="13:00">13:00</option>

            <option value="13:15">13:15</option>

            <option value="13:30">13:30</option>

         <optgroup label="SOIR">

            <option value="19:00">19:00</option>

            <option value="19:15">19:15</option>

            <option value="19:30">19:30</option>

            <option value="19:45">19:45</option>

            <option value="20:00">20:00</option>

            <option value="20:15">20:15</option>

            <option value="20:30">20:30</option>

            <option value="20:45">20:45</option>

            <option value="21:00">21:00</option>

      </select>
      <br /><br><br /><br>

      <input type="submit" name="valider" value="Enregistrer" />

   </form>

</body>

</html>