<?php
session_start();
// Connexion à la base de données

try{
  $bdd=new PDO('mysql:host=localhost;dbname=images_resto','root');
}
catch(Exception $e)
{
   die('Erreur:' .$e->getMessage());
}
   // On regarde si tout les champs sont remplis, sinon, on affiche un message à l'utilisateur.
        if(!empty($_POST["id_images"]) OR !empty($_POST["photo"]) OR !empty($_POST["titre"]))
{
					{                                                       
                    $requete=$bdd->prepare('UPDATE images SET photo = :photo, titre = :titre WHERE id_images = :id_images ');
    	                                  $requete->execute(array(                                      
                                                            'photo' => $_POST['photo'],                                      
                                                            'titre' => $_POST['titre'],
                                                            'id_images' => $_POST['id_images']
                                                           ));
		            header('Location:pagePhotos.php');// Redirection 
		                                                
                    }           
}
