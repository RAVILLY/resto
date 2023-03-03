<!doctype html>

<html>

<head>

     <meta charset="utf-8" />

     <link rel="stylesheet" href="">

     <title>Carte Administration</title>

     <style>
          .breadcrumb {

               padding: 0 .5rem;

          }

          .breadcrumb ul {

               display: flex;

               flex-wrap: wrap;

               list-style: none;

               margin: 0;

               padding: 30px;

          }

          .breadcrumb li:not(:last-child)::after {

               display: inline-block;

               margin: 0 .25rem;

               content: ">>";

          }
     </style>

</head>

<body>

     <nav class="breadcrumb" aria-label="breadcrumb">

          <!-- Déclaration du composant -->

          <ul>

               <!-- Item du fil d'ariane -->

               <li><a href="../index.php">Accueil</a></li>

               <li><a href="../admin/choixAdmin.php">Choix Admin</a></li>

               <li><span aria-current="page">Horaires</span></li>

          </ul>

     </nav>

     <table>

          <caption>

               <h1>HORAIRES D'OUVERTURES</h1>

          </caption>


          <thead> <!-- En-tête du tableau -->

               <tr>

                    <th>Jours</th>

                    <th>Midi</th>

                    <th>Soir</th>

               </tr>

          </thead>

          <tbody>

               <?php

               try {
                    $bdd = new PDO('mysql:host=localhost;dbname=ouverture_resto', 'root');
               } catch (Exception $e) {
                    die('Erreur:' . $e->getMessage());
               }

               $reponse = $bdd->query('SELECT * FROM ouverture ORDER BY id_ouverture ');


               // On affiche chaque entrée une à une

               while ($donnees = $reponse->fetch()) {

               ?>
                    <tr>

                         <td><?php echo $donnees['id_ouverture']; ?></td>

                         <td><?php echo $donnees['jour']; ?></td>

                         <td><?php echo $donnees['midi']; ?></td>

                         <td><?php echo $donnees['soir']; ?></td>
                    </tr>

               <?php
               }

               $reponse->closeCursor(); // Termine le traitement de la requête


               ?>

          </tbody>

     </table>

     <h1>Formulaire d'inscriptions des heures</h1>

     <form>

          <table>

               <tr>

                    <td><label for="jour"><strong>Jour:</strong></label></td>

                    <td><input type="text" name="jour" id="jour" required="required" /></td>

               </tr>

               <tr>

                    <td><label for="midi"><strong>Horaire midi:</strong></label></td>

                    <td><input type="text" name="midi" id="midi" required="required" /></td>

               </tr>

               <tr>

                    <td><label for="soir"><strong>Horaire soir:</strong></label></td>

                    <td><input type="text" name="soir" id="soir" required="required" /></td>

               </tr>

          </table>

          <input type="submit" name="register" value="Envoyer" />

     </form>

     <h1>Formulaire de modifications d'heures</h1>


     <form name="inscription" action="modifierHeure.php" method="post">

          <table>

               <tr>

                    <td><label for="id_ouverture"><strong>N° d'ouverture:</strong></label></td>

                    <td><input type="int" name="id_ouverture" id="id_ouverture" /></td>

               </tr>

               <tr>

                    <td><label for="jour"><strong>Jour:</strong></label></td>

                    <td><input type="text" name="jour" id="jour" required="required" /></td>

               </tr>

               <tr>

                    <td><label for="midi"><strong>Horaire midi:</strong></label></td>

                    <td><input type="text" name="midi" id="midi" required="required" /></td>

               </tr>

               <tr>

                    <td><label for="soir"><strong>Horaire soir:</strong></label></td>

                    <td><input type="text" name="soir" id="soir" required="required" /></td>

               </tr>

          </table>

          <input type="submit" name="register" value="Envoyer" />

     </form>

</body>

</html>