<?php
session_start();
// Connexion à la base de données

try {
    $bdd = new PDO('mysql:host=localhost;dbname=ouverture_resto', 'root');
} catch (Exception $e) {
    die('Erreur:' . $e->getMessage());
}
// On regarde si tout les champs sont remplis, sinon, on affiche un message à l'utilisateur.
if (
    !empty($_POST["id_ouverture"]) or !empty($_POST["jour"]) or !empty($_POST["midi"])
    or !empty($_POST["soir"])
) { {
        $requete = $bdd->prepare('UPDATE ouverture SET jour = :jour, midi = :midi, soir = :soir WHERE id_ouverture = :id_ouverture ');
        $requete->execute(array(
            'jour' => $_POST['jour'],
            'midi' => $_POST['midi'],
            'soir' => $_POST['soir'],
            'id_ouverture' => $_POST['id_ouverture']
        ));
        header('Location:pageHeures.php'); // Redirection 

    }
}
