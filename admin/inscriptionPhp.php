<?php

include("connexion.php");

if (isset($_POST['valider'])) { // si formulaire soumis

    $echelon = test_input($_POST["echelon"]);

    $prenom = test_input($_POST["prenom"]);

    $email = test_input($_POST["email"]);

    $mot_de_passe = test_input($_POST["mot_de_passe"]);

    $repass = test_input($_POST["repass"]);

    if (
        !empty($_POST["echelon"]) and !empty($_POST["prenom"]) and !empty($_POST["email"]) and !empty($_POST["mot_de_passe"])
        and !empty($_POST["repass"])
    ) {

        $poste = strlen($echelon);
        if ($poste <= 10) {
            if (!preg_match("#/^[a-zA-Z]*$/#", $poste))

                $petitNom = strlen($prenom);
            if ($petitNom <= 10) {
                if (!preg_match("#/^[a-zA-Z]*$/#", $petitNom))

                    $mdp = strlen($mot_de_passe);
                if ($mdp >= 8) {
                    if (!preg_match("#/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/#", $mdp))

                        if ($_POST['mot_de_passe'] == $_POST['repass']) {

                            if ($email);
                            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {


                                $sel = $pdo->prepare("select id from admistration where echelon=? limit 1");
                                $sel->execute(array($echelon));
                                $tab = $sel->fetchAll();
                                if (count($tab) > 0)
                                    $faux = "Ce grade existe déjà!";
                                else {

                                    $ins = $pdo->prepare("insert into admistration(echelon,prenom,mot_de_passe,email) values(?,?,?,?)");
                                    $ins->execute(array($echelon, $prenom, password_hash($mot_de_passe, PASSWORD_DEFAULT), $email));

                                    $ok = 'Maintenant que vous êtes enregistré, vous pouvez vous connecter <a href="login.php">ici</a> sur votre compte.';
                                }
                            } else {

                                $faux = "Votre adresse mail n'est pas valide !";
                            }
                        } else {

                            $faux = 'La confirmation du mot de passe ne convient pas au site. Soit il ne contient pas au minimum 8 caractères dont:<br>
                        Au moins une lettre majuscule, 
                        au moins une lettre minuscule,
                        au moins un chiffre,
                        au moins un caractère spécial.<br>
                        Ou soit il ne correspond pas au premier mot de passe.
                        Merci de réctifier les demandes.';
                        }
                } else {

                    $faux = 'Le mot de passe ne convient pas au site. Il doit être formé au minimum de 8 caractères dont:<br>
                Au moins une lettre majuscule, 
                au moins une lettre minuscule,
                au moins un chiffre,
                au moins un caractère spécial,merci.';
                }
            } else {

                $faux = 'Le prénom doit contenir que des lettres et ne doit pas dépasser 10 lettres.';
            }
        } else {

            $faux = 'L\'échelon doit contenir que des lettres et ne doit pas dépasser 10 lettres.';
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

    <title>Authentification administration</title>

    <link rel="stylesheet" href="admin.css">

</head>

<body>

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

    <?php

    if (!empty($ok)) {

    ?>

        <div class="response-erreur">

            <?php echo '<font color="green">' . $ok . "</font>"; ?>

        </div>


        <?php

    }

        ?><?php

                if (!empty($faux)) {

                ?>

        <div class="response-erreur">

            <?php echo '<font color="red">' . $faux . "</font>"; ?>

        </div>


    <?php

                }

    ?><br>

    [ <a href="secret.php">Recommencer</a> ]

</body>

</html>