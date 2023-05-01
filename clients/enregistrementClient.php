<?php
session_start();

if (isset($_POST['valider'])) {
   $erreur = login($_POST['email'], $_POST['mot_de_passe']);
   echo $erreur;
}

function login($login, $password)
{
   require 'connexion.php';

   $statement = $pdo->prepare('select * from clients where email=? limit 1');
   $statement->execute([$login]);
   $account = $statement->fetch();

   if (false === $account) {
      return 'Compte inconnu.';
   }

   if (false === password_verify($password, $account['mot_de_passe'])) {
      return 'Mot de passe  Email ou non valide.';
   }

   $_SESSION['prenomNom'] = ucfirst(strtolower($account['prenom'])) . ' ' . strtoupper($account['nom']);
   $_SESSION['autoriser'] = "oui";

   header('location: reservation.php');
   exit;
}

?>

<!DOCTYPE html>

<html>

<head>

   <meta charset="utf-8" />

   <title>Login</title>

   <link rel="stylesheet" href="ClientCss.css">


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

   <h1>Authentification [ <a href="formulaireClient.php">Créer un compte</a> ]</h1>




   <form id="email-form" name="email-form" method="post" action=""><!-- name="fo" method="post" -->

      <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">

         <tr>

            <td>

               <div class="label">Email:</div>

               <div class="field">

                  <input type="text" name="email" placeholder="email" /><br /><br><br>


               </div>

            </td>

         </tr>

         <tr>

            <td>

               <div class="label">Mot de passe:</div>

               <div class="field">

                  <input type="password" name="mot_de_passe" placeholder="Mot de passe" /><br />
                  <br /><br>


               </div>

            </td>

         </tr>

         <tr>

            <td>

               <div class="field">

                  <input type="submit" name="valider" value="S'authentifier" /><br>

               </div>

            </td>

         </tr>

      </table>

   </form>

</body>

</html>