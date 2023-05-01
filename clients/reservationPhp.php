<?php
$genre = '';

if (empty($_POST["genre"])) {
    $erreur = "Veuillez indiquer le genre";
  } else {
    $genre = test_input($_POST["genre"]);
  }


?>


<?php

include("connexion.php");

if (isset($_POST['envoi'])) { // si formulaire soumis

    $nom = test_input($_POST["nom"]);

    $prenom = test_input($_POST["prenom"]);

    $email = test_input($_POST["email"]);

    $nombres = test_input($_POST["nombres"]);

    $dates = $_POST["dates"];

    $heures = $_POST["heures"];

    if (
        !empty($_POST["genre"]) AND !empty($_POST["nom"]) and !empty($_POST["prenom"]) and !empty($_POST["email"])
        and !empty($_POST["nombres"]) and !empty($_POST["dates"]) and !empty($_POST["heures"])
    ) {



        $famille = strlen($nom);
        if ($famille <= 20) {
            if (!preg_match("#/^[a-zA-Z ]*$/#", $famille))

                $petitNom = strlen($prenom);
            if ($petitNom <= 10) {
                if (!preg_match("#/^[a-zA-Z ]*$/#", $petitNom))

                    $places = $_POST['nombres'];
                if ($places <= 10) {
                    if (!preg_match(("#/^[0-10]$/#"), $places))


                        if ($email);
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {



                        $ins = $pdo->prepare('insert into reservation(nom,prenom,email,nombres,dates,heures) values(?,?,?,?,?,?)');
                        $ins->execute(array($nom, $prenom, $email, $nombres, $dates, $heures));

                        $to = $_POST["email"];

                        $subject = 'Réservation au restaurant Quai Antique';

                        $from = $_POST["email"];

                        $message =  '
    <html>
    <head>
       <title>Rappel de votre réservation ...</title>
    </head>
    <body>
       <p>Bonjour ' . $genre . ' ' . $nom . ', vous avez réservé sur notre site pour le ' . $dates . ' ' . $places . ' places à ' . $heures . ' heures.<br>
       L\'équipe du Quai Antique vous souhaite la bienvenue.</p>
    </body>
    </html>';

                        $headers = "From: $from";

                        //Envoi du mail
                        mail($to, $subject, $message, $headers);
                        $ok = '<h2>Vous allez recevoir un mail de confirmation.</2>';
                    } else {

                        $erreur = "Votre adresse mail n'est pas valide !";
                    }
                } else {

                    $erreur   = 'Au-delà de 10 places, veuillez nous contacter au 00 00 00 00 00, merci.';
                }
            } else {

                $erreur = 'Le prénom doit contenir que des lettres et ne doit pas dépasser 10 lettres.';
            }
        } else {

            $erreur = 'Le nom doit contenir que des lettres et ne doit pas dépasser 20 lettres.';
            
        }
    } else {

        $erreur = 'Votre demande c\'est mal déroulée. S\'il vous plait, réessayer.';
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
//header("location:.php");
?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8" />

    <link rel="stylesheet" href="reservationCss.css">

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

    ?><br>

    [ <a href="reservation.php">Retour au formulaire</a> ] ou [ <a href="deconnexion.php">déconnexion]</a>


</body>

</html>