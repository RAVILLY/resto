<!doctype html>
<html lang="fr">

<head>
     <meta charset="utf-8" />
     <link rel="stylesheet" href="carte.css">
     <title>La carte</title>
</head>

<body>


     <nav class="breadcrumb" aria-label="breadcrumb">

          <!-- Déclaration du composant -->

          <ul>

               <!-- Item du fil d'ariane -->

               <li><a href="index.php">Accueil</a></li>

               <li><span aria-current="page">Menu du jour</span></li>

          </ul>

     </nav>

     <h1>CARTE DU QUAI ANTIQUE</h1>

     <main>

          <fieldset>

               <legend>Quelques spécialités de la maison</legend>

               <table>

                    <thead> <!-- En-tête du tableau -->

                         <tr>
                              <th>ENTREES</th>

                              <th>PRIX</th>
                         </tr>

                    </thead>

                    <tbody>

                         <?php
                         try {
                              $bdd = new PDO('mysql:host=localhost;dbname=restau_database', 'root');
                         } catch (Exception $e) {
                              die('Erreur:' . $e->getMessage());
                         }



                         $reponse = $bdd->query('SELECT * FROM entre ORDER BY id_entre ');


                         // On affiche chaque entrée une à une

                         while ($donnees = $reponse->fetch()) {

                         ?>

                              <tr>

                                   <td>

                                        <p id="gauche"><?php echo $donnees['plats']; ?></p>

                                        <p id="ingredients"><?php echo $donnees['ingredients']; ?></p>

                                   </td>

                                   <td>

                                        <p id="centre"><?php echo $donnees['prix']; ?>€</p>

                                   </td>

                              </tr>

                         <?php
                         }
                         $reponse->closeCursor(); // Termine le traitement de la requête


                         ?>

                    </tbody>

                    <thead> <!-- En-tête du tableau -->

                         <tr>

                              <th>PLATS</th>

                         </tr>

                    </thead>

                    <tbody>

                         <?php
                         try {
                              $bdd = new PDO('mysql:host=localhost;dbname=restau_database', 'root');
                         } catch (Exception $e) {
                              die('Erreur:' . $e->getMessage());
                         }



                         $reponse = $bdd->query('SELECT * FROM plats ORDER BY id_plats ');


                         // On affiche chaque entrée une à une

                         while ($donnees = $reponse->fetch()) {

                         ?>

                              <tr>

                                   <td>

                                        <p id="gauche"><?php echo $donnees['plats']; ?></p>

                                        <p id="ingredients"><?php echo $donnees['ingredients']; ?></p>

                                   </td>

                                   <td>

                                        <p id="centre"><?php echo $donnees['prix']; ?>€</p>

                                   </td>

                              </tr>

                         <?php
                         }
                         $reponse->closeCursor(); // Termine le traitement de la requête

                         ?>

                    </tbody>

                    <thead> <!-- En-tête du tableau -->

                         <tr>
                              
                              <th>DESSERTS</th>

                         </tr>

                    </thead>

                    <tbody>

                         <?php
                         try {
                              $bdd = new PDO('mysql:host=localhost;dbname=restau_database', 'root');
                         } catch (Exception $e) {
                              die('Erreur:' . $e->getMessage());
                         }



                         $reponse = $bdd->query('SELECT * FROM desserts ORDER BY id_dessert ');


                         // On affiche chaque entrée une à une

                         while ($donnees = $reponse->fetch()) {

                         ?>

                              <tr>

                                   <td>

                                        <p id="gauche"><?php echo $donnees['plats']; ?></p>

                                        <p id="ingredients"><?php echo $donnees['ingredients']; ?></p>

                                   </td>

                                   <td>

                                        <p id="centre"><?php echo $donnees['prix']; ?></p>

                                   </td>

                              </tr>

                         <?php
                         }
                         $reponse->closeCursor(); // Termine le traitement de la requête

                         ?>

                    </tbody>

               </table>

          </fieldset>

     </main>

</body>

</html>