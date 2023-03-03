<?php
session_start();
// Connexion à la base de données

try {
  $bdd = new PDO('mysql:host=localhost;dbname=restau_database', 'root');
} catch (Exception $e) {
  die('Erreur:' . $e->getMessage());
}

$entre = $_POST["entre"];
$plats = $_POST["plats"];
$desserts = $_POST["desserts"];
$prixPetit = $_POST["prixPetit"];
$prixGrand = $_POST["prixGrand"];


// on teste si les variables du formulaire sont déclarées
if (isset($_POST['entre']) &&isset($_POST['plats']) && isset($_POST['desserts']) && isset($_POST['prixPetit'])&& isset($_POST['prixGrand'])) {
  $req = $bdd->prepare('INSERT INTO menu(entre,plats,desserts,prixPetit,prixGrand) VALUES (?,?,?,?,?)');
  $req->execute(array($entre,$plats, $desserts, $prixPetit,$prixGrand));
}

header('Location:pageMenu.php'); // Redirection