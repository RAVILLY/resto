<?php
session_start();
// Connexion à la base de données

try {
  $bdd = new PDO('mysql:host=localhost;dbname=images_resto', 'root');
} catch (Exception $e) {
  die('Erreur:' . $e->getMessage());
}

$photo = $_POST["photo"];
$titre = $_POST["titre"];


// on teste si les variables du formulaire sont déclarées
if (isset($_POST['photo']) &&isset($_POST['titre']) ) {
  $req = $bdd->prepare('INSERT INTO images(photo,titre) VALUES (?,?)');
  $req->execute(array($photo,$titre));
}

header('Location:pagePhotos.php'); // Redirection