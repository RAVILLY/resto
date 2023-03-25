<?php
session_start();
if ($_SESSION["autoriser"] != "oui") {
    header("location:login.php");
    exit();
}
if (date("H") < 18)
    $bienvenue = "Bonjour et bienvenue " .
        $_SESSION["echelonPrenom"] .
        " dans votre espace personnel";
else
    $bienvenue = "Bonsoir et bienvenue  " .
        $_SESSION["echelonPrenom"] .
        " dans votre espace personnel";
?>

<!doctype html>

<html>

<head>

    <meta charset="utf-8" />

    <title>Administration</title>

    <link rel="stylesheet" href="admin.css">

</head>

<body onLoad="document.fo.login.focus()">

    <h2><?php echo $bienvenue ?></h2>

    <nav id="breadcrumb" aria-label="breadcrumb">

        <!-- Déclaration du composant -->

        <ul>

            <!-- Item du fil d'ariane -->

            <li><a href="deconnexion.php">Accueil</a></li>

            <li><span aria-current="page">connexion</span></li>

        </ul>

    </nav>

    <fieldset>

        <legend>Administration</legend>

        <ul id="navigation">

            <li>

                <input class="butt" type="button" onclick="window.location.href = 'lesReservations.php';" value="Les reservations" />

            </li>

        </ul>

        <ul id="navigation">

            <li>

                <input class="butt" type="button" onclick="window.location.href = '../horaires/pageHeures.php';" value="Heures" />

            </li>

        </ul>

        <ul id="navigation">

            <li>

                <input class="butt" type="button" onclick="window.location.href = '../carteEtMenu/pageModif.php';" value="Carte" />

            </li>

        </ul>


        <ul id="navigation">

            <li>

                <input class="butt" type="button" onclick="window.location.href ='../photos/pagePhotos.php' ;" value="Photos" />

            </li>
        </ul>

        <ul id="navigation">

            <li>

                <input class="butt" type="button" onclick="window.location.href = '../carteEtMenu/pageMenu.php';" value="Menus" />

            </li>

        </ul>



    </fieldset>

</body>

</html>