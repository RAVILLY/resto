<?php
session_start();

if (isset($_POST['valider'])) {
   $erreur = login($_POST['echelon'], $_POST['passe']);
   echo  $erreur;
}

function login($login, $password)
{
   require 'connexion.php';

   $statement = $pdo->prepare('select * from admistration where echelon=? limit 1');
   $statement->execute([$login]);
   $account = $statement->fetch();

   if (false === $account) {
      return 'Compte inconnu.';
   }

   if (false === password_verify($password, $account['mot_de_passe'])) {
      return 'Mot de passe non valide.';
   }

   $_SESSION['echelonPrenom'] = ucfirst(strtolower($account['echelon'])) . ' ' . strtoupper($account['prenom']);
   $_SESSION['autoriser'] = "oui";

   header('location: choixAdmin.php');
   exit;
}

?>

<!DOCTYPE html>

<html>

<head>

   <meta charset="utf-8" />

   <title>Authentification</title>

   <link rel="stylesheet" href="admin.css">


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

   <h1>Authentification [ <a href="secret.php">Créer un compte</a> ]</h1>

   <form name="fo" method="post" action="">

      <input type="text" name="echelon" autocomplete="off" placeholder="echelon" /><br />

      <input type="password" name="passe" autocomplete="off" placeholder="Mot de passe" /><br />

      <input type="submit" name="valider" value="S'authentifier" />

   </form>

</body>

</html>