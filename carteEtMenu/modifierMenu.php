<?php
session_start();
// Connexion à la base de données

try {
   $bdd = new PDO('mysql:host=localhost;dbname=restau_database', 'root');
} catch (Exception $e) {
   die('Erreur:' . $e->getMessage());
}
// On regarde si tout les champs sont remplis, sinon, on affiche un message à l'utilisateur.
if (
   !empty($_POST["id_menu"]) or !empty($_POST["entre"]) or !empty($_POST["plats"])
   or !empty($_POST["desserts"]) or !empty($_POST["prixPetit"]) or !empty($_POST["prixGrand"])
) { {
      $requete = $bdd->prepare('UPDATE menu SET entre = :entre, plats = :plats, desserts = :desserts, prixPetit = :prixPetit, prixGrand = :prixGrand WHERE id_menu = :id_menu ');
      $requete->execute(array(
         'entre' => $_POST['entre'],
         'plats' => $_POST['plats'],
         'desserts' => $_POST['desserts'],
         'prixPetit' => $_POST['prixPetit'],
         'prixGrand' => $_POST['prixGrand'],
         'id_menu' => $_POST['id_menu']
      ));
      header('Location:pageMenu.php'); // Redirection 

   }
}
