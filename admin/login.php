<?php
session_start();

if (isset($_POST['valider'])) {
   $erreur = login($_POST['echelon'], $_POST['passe']);
   echo $erreur;
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

   <h1>Authentification [ <a href="secret.php">Créer un compte</a> ]</h1>

   <form name="fo" method="post" action="">

      <input type="text" name="echelon" autocomplete="off" placeholder="echelon" /><br />

      <input type="password" name="passe" autocomplete="off" placeholder="Mot de passe" /><br />

      <input type="submit" name="valider" value="S'authentifier" />

   </form>

</body>

</html>