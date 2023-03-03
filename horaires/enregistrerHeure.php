<?php
session_start();
// Connexion à la base de données

try {
  $bdd = new PDO('mysql:host=localhost;dbname=ouverture_resto', 'root');
} catch (Exception $e) {
  die('Erreur:' . $e->getMessage());
}

$jour = $_POST["jour"];
$midi = $_POST["midi"];
$soir = $_POST["soir"];


// on teste si les variables du formulaire sont déclarées
if (isset($_POST['jour']) &&isset($_POST['midi']) && isset($_POST['soir'])) {
  $req = $bdd->prepare('INSERT INTO ouverture(jour,midi,soir) VALUES (?,?,?)');
  $req->execute(array($jour,$midi, $soir));
}

header('Location:pageHeures.php'); // Redirection