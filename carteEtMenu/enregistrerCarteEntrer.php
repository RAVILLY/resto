<?php
session_start();
// Connexion à la base de données

try {
  $bdd = new PDO('mysql:host=localhost;dbname=restau_database', 'root');
} catch (Exception $e) {
  die('Erreur:' . $e->getMessage());
}

$plats = $_POST["plats"];
$ingredients = $_POST["ingredients"];
$prix = $_POST["prix"];


// on teste si les variables du formulaire sont déclarées
if (isset($_POST['plats']) && isset($_POST['ingredients']) && isset($_POST['prix'])) {
  $req = $bdd->prepare('INSERT INTO entre(plats,ingredients,prix) VALUES (?,?,?)');
  $req->execute(array($plats, $ingredients, $prix));
}

header('Location:pageModif.php'); // Redirection
