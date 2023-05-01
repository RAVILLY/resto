<?php

include("connexion.php");

if (isset($_POST['valider'])) { // si formulaire soumis

    $nom = test_input($_POST["nom"]);

    $prenom = test_input($_POST["prenom"]);

    $email = test_input($_POST["email"]);

    $mot_de_passe = test_input($_POST["mot_de_passe"]);

    $repass = test_input($_POST["repass"]);

    $telephone = test_input($_POST["telephone"]);

    if (
        !empty($_POST["nom"]) and !empty($_POST["prenom"]) and !empty($_POST["mot_de_passe"])
        and !empty($_POST["repass"]) and !empty($_POST["telephone"]) and !empty($_POST["email"])
    ) {

        $famille = strlen($nom);
        if ($famille <= 20) {
            if (!preg_match("#/^[a-zA-Z]*$/#", $famille))

                $petitNom = strlen($prenom);
            if ($petitNom <= 10) {
                if (!preg_match("#/^[a-zA-Z]*$/#", $petitNom))

                    $mdp = strlen($mot_de_passe);
                if ($mdp >= 8) {
                    if (!preg_match("#/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/#", $mdp))

                        if ($_POST['mot_de_passe'] == $_POST['repass']) {

                            $places = strlen($telephone);
                            if ($places <= 10) {
                                if (!preg_match(("#/^[0-10]$/#"), $places))


                                    if ($email);
                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {


                                    $sel = $pdo->prepare("select id from clients where email=? limit 1");
                                    $sel->execute(array($email));
                                    $tab = $sel->fetchAll();
                                    if (count($tab) > 0)
                                        $erreur = "Cette email existe déjà!";
                                    else {

                                        $ins = $pdo->prepare("insert into clients(nom,prenom,mot_de_passe,email,telephone) values(?,?,?,?,?)");
                                        $ins->execute(array($nom, $prenom, password_hash($mot_de_passe, PASSWORD_DEFAULT), $email, $telephone));

                                        $ok = 'Maintenant que vous êtes enregistré, vous pouvez vous connecter <a href="enregistrementClient.php">ici</a> pour faire votre réservation.';
                                        //header("location:");
                                    }
                                } else {

                                    $erreur = "Votre adresse mail n'est pas valide !";
                                }
                            } else {

                                $erreur = 'Le numéro de téléphone doit être de ce format 0000000000, merci.';
                            }
                        } else {

                            $erreur = 'La confirmation du mot de passe ne convient pas au site. Soit il ne contient pas au minimum de 8 caractères dont:<br>
                    Au moins une lettre majuscule, 
                    au moins une lettre minuscule,
                    au moins un chiffre,
                    au moins un caractère spécial.<br>
                    Ou soit il ne correspond pas au premier mot de passe.
                    Merci de réctifier les demandes.';
                        }
                } else {

                    $erreur = 'Le mot de passe ne convient pas au site. Il doit être formé au minimum de 8 caractères dont:<br>
                Au moins une lettre majuscule, 
                au moins une lettre minuscule,
                au moins un chiffre,
                au moins un caractère spécial,merci.';
                }
            } else {

                $erreur = 'Le prénom doit contenir que des lettres et ne doit pas dépasser 10 lettres.';
            }
        } else {

            $erreur = 'Le nom doit contenir que des lettres et ne doit pas dépasser 20 lettres.';
        }
    }
}
//fonction pour sécuriser les données
function test_input($data)
{
    $data = trim($data);             //Supprime les espaces (ou d'autres caractères) en début et fin de chaîne 
    $data = stripslashes($data);     // Décode une chaîne encodée avec addcslashes()
    $data = htmlspecialchars($data); //Convertit les caractères spéciaux en entités HTML
    return $data;
}
?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8" />

    <title>Inscription</title>

    <link rel="stylesheet" href="ClientCss.css">

</head>

<body>
    <?php

    if (!empty($ok)) {

    ?>


        <div class="response-fausse">

            <?php echo '<font color="green">' . $ok . "</font>"; ?>

        </div>


    <?php

    }

    ?>

    <?php

    if (!empty($erreur)) {

    ?>


        <div class="response-fausse">

            <?php echo '<font color="red">' . $erreur . "</font>"; ?>

        </div>


    <?php

    }

    ?>

    <div class="nav">

        <nav class="breadcrumb" aria-label="breadcrumb">

            <!-- Déclaration du composant -->

            <ul>

                <!-- Item du fil d'ariane -->

                <li><a href="../index.php">Accueil</a></li>

                <li><a href="enregistrementClient.php">Connexion</a></li>

                <li><span aria-current="page">Inscription</span></li>

            </ul>

        </nav>
    </div>


    <h1>Je m'inscris</h1>


    <form name="fo" method="post" action="">


        <input type="text" name="nom" placeholder="nom" pattern="^[A-Za-z]+$" /><br />


        <input type="text" name="prenom" placeholder="Prénom" pattern="^[A-Za-z]+$" /><br />

        <!--Formé d'un minimum de 8 caractères. Ajustez-le en modifiant {8,}    
    Au moins une lettre majuscule. Vous pouvez supprimer cette condition en supprimant (?=.*?[A-Z])
    Au moins une lettre minuscule. Vous pouvez supprimer cette condition en supprimant (?=.*?[a-z])
    Au moins un chiffre. Vous pouvez supprimer cette condition en supprimant (?=.*?[0-9])
    Au moins un caractère spécial, Vous pouvez supprimer cette condition en supprimant (?=.*?[#?!@$%^&*-]) -->

        <input type="password" name="mot_de_passe" placeholder="mot de passe" /><br />


        <input type="password" name="repass" placeholder="Confirmer Mot de passe" /><br />


        <input type="tel" name="telephone" placeholder="Tel au format xxxxxxxxxx" pattern="[0-9]{10}" /><br />


        <input type="text" name="email" placeholder="email" /><br />

        <input type="submit" name="valider" value="S'authentifier" />

    </form>

</body>

</html>