
<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8" />

    <title>Authentification administration</title>

    <link rel="stylesheet" href="admin.css">

</head>

<body>

    <?php
    if (isset($_POST['mdp']) and $_POST['mdp'] == "*Tours37*") // Si le mot de passe est bon
    {
        // On affiche le formulaire
    ?>

        <div class="nav">

            <nav class="breadcrumb" aria-label="breadcrumb">

                <!-- Déclaration du composant -->

                <ul>

                    <!-- Item du fil d'ariane -->

                    <li><a href="../index.php">Accueil</a></li>

                    <li><span aria-current="page">Inscription</span></li>

                </ul>

            </nav>
        </div>


        <h1>Inscription</h1>

        <form name="fo" method="post" action="inscriptionPhp.php">

            <input type="text" name="echelon" placeholder="echelon" /><br />

            <input type="password" name="mot_de_passe" placeholder="mot de passe" /><br />

            <input type="password" name="repass" placeholder="Confirmer Mot de passe" /><br />

            <input type="text" name="email" placeholder="email" /><br />

            <input type="text" name="prenom" placeholder="Prénom" /><br />

            <input type="submit" name="valider" value="Validation" />

        </form>
    <?php
    } else {
        //sinon, on affiche un message d'erreur
    ?>
        <div class="response-erreur">
            <?php echo  '<font color="red"><p>Vous n’avez pas les droits suffisants pour accéder à cette page.<br>
        veuillez vous rapprocher de l\'administration. Merci. </p>'; 
        ?>
        </div>
    <?php
    }
    ?>

    [ <a href="secret.php">Recommencer</a> ]

</body>

</html>