<?php
session_start();
// Connexion à la base de données

try{
  $bdd=new PDO('mysql:host=localhost;dbname=restau_database','root');
}
catch(Exception $e)
{
   die('Erreur:' .$e->getMessage());
}
   // On regarde si tout les champs sont remplis, sinon, on affiche un message à l'utilisateur.
        if(!empty($_POST["id_desserts"]) OR !empty($_POST["plats"]) OR !empty($_POST["ingredients"]) OR !empty($_POST["prix"]))
{
					{                                                       
                    $requete=$bdd->prepare('UPDATE desserts SET plats = :plats, ingredients = :ingredients, prix = :prix WHERE id_desserts = :id_desserts ');
    	                                  $requete->execute(array(                                      
                                                            'plats' => $_POST['plats'],
		                                                    'ingredients' => $_POST['ingredients'],
    	                                                    'prix' => $_POST['prix'],
    	                                                    'id_desserts' => $_POST['id_desserts']
                                                           ));
		            header('Location:pageModif.php');// Redirection 
		                                                
                    }           
}
?>
