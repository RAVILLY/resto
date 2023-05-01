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
$genre = "";
$genre1 = "";
$genre2 = "";
if (isset($_POST['envoi'])) { // si formulaire soumis
   if (isset($_POST['genre'])) {
      $recup = $_POST['genre'];
      $genre1 = $recup == "h" ? "checked" : "";
      $genre2 = $recup == "f" ? "checked" : "";
   }
}
?>


<!DOCTYPE html>

<html>

<head>

   <meta charset="utf-8" />

   <title>Formulaire de réservations</title>

   <link rel="stylesheet" href="ClientCss.css">

</head>

<body>

   <h1>RESERVATION</h1>



   <form id="email-form" name="email-form" method="post" action="reservationPhp.php">

      <h2><?php echo $bienvenue ?></h2>

      <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">

         <tr>

            <td>

               <div class="label">Genre :</div>

               <div class="field">

                  <input type="radio" name="genre" value="Monsieur" />H <br>
                  <input type="radio" name="genre" value="Madame" />F<br><br>


               </div>

            </td>

         </tr>

         <tr>

            <td>

               <div class="label">Nom:</div>

               <div class="field">

                  <input type="text" name="nom" placeholder="Nom" required /><br><br>

               </div>

            </td>

         </tr>

         <tr>

            <td>

               <div class="label">Prénom:</div>

               <div class="field">

                  <input type="text" name="prenom" placeholder="Prénom" required><br><br>

               </div>

            </td>

         </tr>

         <tr>

            <td>

               <div class="label">E-mail:</div>

               <div class="field">

                  <input name="email" type="text" id="email" required /><br><br>

               </div>

            </td>

         </tr>

         <tr>

            <td>

               <div class="label">Dates:</div>

               <div class="field">

                  <input id="date" type="date" name="dates" required><br><br>

               </div>

            </td>

         </tr>

         <tr>

            <td>

               <div class="label">Nombres de places (10 max, au-delà nous contacter, merci.) :</div>

               <div class="field">

                  <input type="number" id="tentacles" name="nombres" placeholder="Places" required /><br><br>

               </div>

            </td>

         </tr>

         <tr>

         <tr>

            <td>

               <div class="label">Heures:</div>

               <div class="field">
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
                  <br /><br>


               </div>

            </td>

         </tr>

         <tr>

            <td>

               <div class="field">

                  <input type="submit" name="envoi" /><br>

               </div>

            </td>

         </tr>

      </table>

   </form>

</body>

</html>