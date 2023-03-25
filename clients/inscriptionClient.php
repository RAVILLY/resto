<?php
   session_start();
   @$nom=$_POST["nom"];
   @$prenom=$_POST["prenom"];
   @$mot_de_passe=$_POST["mot_de_passe"];
   @$repass=$_POST["repass"];
   @$email = $_POST["email"];
   @$telephone=$_POST["telephone"];
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      if(empty($nom)) $erreur="Nom laissé vide!";
      elseif(empty($prenom)) $erreur="Prénom laissé vide!";
      elseif(empty($mot_de_passe)) $erreur="mot de passe laissé vide!";
      elseif($mot_de_passe!=$repass) $erreur="Mot de passe non identiques!";
      elseif(empty($email)) $erreur="Email laissé vide!";
      elseif(empty($telephone)) $erreur="Téléphone laissé vide!";
      else{
         include("connexion.php");
         $sel=$pdo->prepare("select id from clients where telephone=? limit 1");
         $sel->execute(array($telephone));
         $tab=$sel->fetchAll();
         if(count($tab)>0)
            $erreur="Le Téléphone existe déjà!";
         else{
            $ins=$pdo->prepare("insert into clients(nom,prenom,mot_de_passe,email,telephone) values(?,?,?,?,?)");
            if($ins->execute(array($nom,$prenom,$mot_de_passe,$email,$telephone)))
               header("location:enregistrementClient.php");
         }   
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

<body>

   <h1>Je m'inscris</h1>

   <div class="erreur"><?php echo $erreur ?></div>

   <form name="fo" method="post" action="">

      <input type="text" name="nom" placeholder="nom" pattern="^[A-Za-z '-]+$" value="<?php echo $nom ?>"/><br />

      <input type="text" name="prenom" placeholder="Prénom" pattern="^[A-Za-z '-]+$" value="<?php echo $prenom ?>"/><br />

      <input type="password" name="mot_de_passe" placeholder="mot de passe" value="<?php echo $mot_de_passe ?>"/><br />

      <input type="password" name="repass" placeholder="Confirmer Mot de passe" /><br />

      <input type="text" name="email" placeholder="email" pattern="^[A-Za-z]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$" value="<?php echo $email ?>"/><br />

      <input type="tel" name="telephone" placeholder="Tel au format xx xx xx xx xx" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" value="<?php echo $telephone ?>" /><br />

      <input type="submit" name="valider" value="S'authentifier" />

   </form>

   <?php

   ?>

</body>

</html>      

