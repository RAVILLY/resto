<?php
session_start();
@$email = $_POST["email"];
@$mot_de_passe =  $_POST["mot_de_passe"];
@$valider = $_POST["valider"];
$erreur = "";

if (isset($valider)) {
   include("connexion.php");
   $sel = $pdo->prepare("select * from clients where email=? and mot_de_passe=? limit 1"); // 
   $sel->execute(array($email, $mot_de_passe));
   $tab = $sel->fetchAll();

   if (count($tab) > 0) {
      $_SESSION["prenomNom"] = ucfirst(strtolower($tab[0]["prenom"])) .
         " " . strtoupper($tab[0]["nom"]);
      $_SESSION["autoriser"] = "oui";
      header("location:reservation.php");
   } else {
      $erreur = "Mauvais login ou mot de passe!";
   }
}
?>

<!DOCTYPE html>

<html>

<head>

   <meta charset="utf-8" />

   <style>
      .breadcrumb {

         padding: 0 .5rem;

      }

      .breadcrumb ul {

         display: flex;

         flex-wrap: wrap;

         list-style: none;

         margin: 0;

         padding: 30px;

      }

      .breadcrumb li:not(:last-child)::after {

         display: inline-block;

         margin: 0 .25rem;

         content: ">>";

      }

      * {

         font-family: arial;

      }

      body {

         margin: 20px;

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

      a {

         font-size: 12pt;

         color: #EE6600;

         text-decoration: none;

         font-weight: normal;

      }

      a:hover {

         text-decoration: underline;

      }
   </style>

</head>

<body onLoad="document.fo.login.focus()">

   <nav class="breadcrumb" aria-label="breadcrumb">

      <!-- Déclaration du composant -->

      <ul>

         <!-- Item du fil d'ariane -->

         <li><a href="../index.php">Accueil</a></li>

         <li><span aria-current="page">connexion</span></li>

      </ul>

   </nav>

   <h1>Authentification [ <a href="inscriptionClient.php">Créer un compte</a> ]</h1>

   <div class="erreur"><?php echo $erreur ?></div>

   <form name="fo" method="post" action="">

      <input type="text" name="email" placeholder="email"  /><br />

      <input type="password" name="mot_de_passe" placeholder="Mot de passe" /><br />

      <input type="submit" name="valider" value="S'authentifier" />

   </form>

</body>

</html>