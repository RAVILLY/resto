
<?php
   session_start();
   @$echelon=$_POST["echelon"];
   @$mot_de_passe=$_POST["mot_de_passe"];
   @$repass=$_POST["repass"];
   @$email=$_POST["email"];
   @$prenom=$_POST["prenom"];
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      if(empty($echelon)) $erreur="échelon laissé vide!";
      elseif(empty($mot_de_passe)) $erreur="mot de passe laissé vide!";
      elseif($mot_de_passe!=$repass) $erreur="Mot de passe non identiques!";
      elseif(empty($email)) $erreur="Email laissé vide!";
      elseif(empty($prenom)) $erreur="Prénom laissé vide!";
      else{
         include("connexion.php");
         $sel=$pdo->prepare("select id from admistration where echelon=? limit 1");
         $sel->execute(array($echelon));
         $tab=$sel->fetchAll();
         if(count($tab)>0)
            $erreur="échelon existe déjà!";
         else{
            $ins = $pdo->prepare('insert into admistration(echelon,mot_de_passe,email,prenom) values(?,?,?,?)');
            if ($ins->execute(array($echelon,password_hash($mot_de_passe, PASSWORD_DEFAULT), $email, $prenom)))
               header("location:login.php");
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

   <?php
   if (isset($_POST['mdp']) and $_POST['mdp'] == "kangourou") // Si le mot de passe est bon
   {

   //<input type="password" id="ssn" inputmode="number" minlength="9" maxlength="12"
   //pattern="(?!000)([0-6]\d{2}|7([0-6]\d|7[012]))([ -])?(?!00)\d\d\3(?!0000)\d{4}"
   //required autocomplete="off">

   ?>



      <h1>Inscription</h1>

      <div class="erreur"><?php echo $erreur ?></div>

      <form name="fo" method="post" action="">

         <input type="text" name="echelon" placeholder="echelon" value="<?php echo $echelon ?>" /><br />

         <input type="password" name="mot_de_passe" placeholder="mot de passe" value="<?php echo $mot_de_passe ?>" /><br />

         <input type="password" name="repass" placeholder="Confirmer Mot de passe" /><br />

         <input type="text" name="email" placeholder="email" <?php echo $email?>/><br />

         <input type="text" name="prenom" placeholder="Prénom" value="<?php echo $prenom ?>" /><br />

         <input type="submit" name="valider" value="S'authentifier" />

      </form>

   <?php
   } else // sinon, on affiche un message d'erreur

   {

      echo '<p>Mot de passe incorrect !</p>';
   }

   ?>

</body>

</html>