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

               <li><span aria-current="page">connexion</span></li>

          </ul>

     </nav>

          <table>

               <caption>

                    <h1>CARTE ENTREES</h1>

               </caption>


               <thead> <!-- En-tête du tableau -->

                    <tr>

                         <th>N°</th>

                         <th>ENTREES</th>

                         <th>DESCRIPTIONS</th>

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

                              <td><?php echo $donnees['id_entre']; ?></td>

                              <td><?php echo $donnees['plats']; ?></td>

                              <td><?php echo $donnees['ingredients']; ?></td>

                              <td><?php echo $donnees['prix']; ?></td>
                         </tr>

                    <?php
                    }

                    $reponse->closeCursor(); // Termine le traitement de la requête


                    ?>

               </tbody>

          </table>

          <table>

               <caption>

                    <h1>CARTE PLATS</h1>

               </caption>

               <thead> <!-- En-tête du tableau -->

                    <tr>

                         <th>N° </th>

                         <th>PLATS</th>

                         <th>DESCRIPTIONS</th>

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

                    $reponse = $bdd->query('SELECT * FROM plats ORDER BY id_plats ');

                    // On affiche chaque entrée une à une

                    while ($donnees = $reponse->fetch()) {

                    ?>
                         <tr>

                              <td><?php echo $donnees['id_plats']; ?></td>

                              <td><?php echo $donnees['plats']; ?></td>

                              <td><?php echo $donnees['ingredients']; ?></td>

                              <td><?php echo $donnees['prix']; ?></td>
                         </tr>

                    <?php
                    }
                    $reponse->closeCursor(); // Termine le traitement de la requête


                    ?>

               </tbody>

          </table>

          <table>

               <caption>

                    <h1>CARTE DESSERTS</h1>

               </caption>

               <thead> <!-- En-tête du tableau -->

                    <tr>

                         <th>N°</th>

                         <th>ENTREES</th>

                         <th>DESCRIPTIONS</th>

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

                    $reponse = $bdd->query('SELECT * FROM desserts ORDER BY id_dessert ');

                    // On affiche chaque entrée une à une

                    while ($donnees = $reponse->fetch()) {

                    ?>
                         <tr>

                              <td><?php echo $donnees['id_dessert']; ?></td>

                              <td><?php echo $donnees['plats']; ?></td>

                              <td><?php echo $donnees['ingredients']; ?></td>

                              <td><?php echo $donnees['prix']; ?></td>
                         </tr>

                    <?php
                    }
                    $reponse->closeCursor(); // Termine le traitement de la requête


                    ?>

               </tbody>

          </table>

     <h1>Formulaire d'inscriptions des entrées</h1>

     <form name="inscription" action="enregistrerCarteEntrer.php" method="post">

          <table>

               <tr>

                    <td><label for="plats"><strong>plats:</strong></label></td>

                    <td><input type="text" name="plats" id="plats" required="required" /></td>

               </tr>

               <tr>

                    <td><label for="ingredients"><strong>ingrédients:</strong></label></td>

                    <td><input type="text" name="ingredients" id="ingredients" required="required" /></td>

               </tr>

               <tr>

                    <td><label for="prix"><strong>prix:</strong></label></td>

                    <td><input type="int" name="prix" id="prix" /></td>

               </tr>
          </table>

          <input type="submit" name="register" value="Envoyer" />

     </form>

     <h1>Formulaire d'inscriptions des plats</h1>

     <form name="inscription" action="enregistrerCartePlats.php" method="post">

          <table>

               <tr>

                    <td><label for="plats"><strong>plats:</strong></label></td>

                    <td><input type="text" name="plats" id="plats" required="required" /></td>

               </tr>

               <tr>

                    <td><label for="ingredients"><strong>ingrédients:</strong></label></td>

                    <td><input type="text" name="ingredients" id="ingredients" required="required" /></td>

               </tr>

               <tr>

                    <td><label for="prix"><strong>prix:</strong></label></td>

                    <td><input type="int" name="prix" id="prix" /></td>

               </tr>

          </table>

          <input type="submit" name="register" value="Envoyer" />

     </form>

     <h1>Formulaire d'inscriptions des desserts</h1>

     <form name="inscription" action="enregistrerCarteDessert.php" method="post">

          <table>

               <tr>

                    <td><label for="plats"><strong>plats:</strong></label></td>

                    <td><input type="text" name="plats" id="plats" required="required" /></td>

               </tr>

               <tr>

                    <td><label for="ingredients"><strong>ingrédients:</strong></label></td>

                    <td><input type="text" name="ingredients" id="ingredients" required="required" /></td>

               </tr>

               <tr>

                    <td><label for="prix"><strong>prix:</strong></label></td>

                    <td><input type="text" name="text" id="text" /></td>

               </tr>

          </table>

          <input type="submit" name="register" value="Envoyer" />


     </form>

     <h1>Formulaire de modifications d'entrées</h1>


     <form name="inscription" action="modifierCarteEntrer.php" method="post">

          <table>

               <tr>

                    <td><label for="id_entre"><strong>N° d'entrées:</strong></label></td>

                    <td><input type="int" name="id_entrer" id="id_entrer" /></td>

               </tr>

               <tr>

                    <td><label for="plats"><strong>Plats:</strong></label></td>

                    <td><input type="text" name="plats" id="plats" required="required" /></td>

               </tr>

               <tr>

                    <td><label for="ingredients"><strong>Ingrédients:</strong></label></td>

                    <td><input type="text" name="ingredients" id="ingredients" /></td>

               </tr>

               <tr>

                    <td><label for="prix"><strong>Prix:</strong></label></td>

                    <td><input type="int" name="prix" id="prix" required="required" /></td>

               </tr>

          </table>

          <input type="submit" name="register" value="Envoyer" />

     </form>

     <h1>Formulaire de modifications de plats</h1>

     <form name="inscription" action="modifierCartePlats.php" method="post">

          <table>

               <tr>

                    <td><label for="id_plats"><strong>N° de plats:</strong></label></td>

                    <td><input type="int" name="id_plats" id="id_plats" /></td>

               </tr>

               <tr>

                    <td><label for="plats"><strong>Plats:</strong></label></td>

                    <td><input type="text" name="plats" id="plats" required="required" /></td>

               </tr>

               <tr>

                    <td><label for="ingredients"><strong>Ingrédients:</strong></label></td>

                    <td><input type="text" name="ingredients" id="ingredients" /></td>

               </tr>

               <tr>

                    <td><label for="prix"><strong>Prix:</strong></label></td>

                    <td><input type="int" name="prix" id="prix" required="required" /></td>

               </tr>

          </table>

          <input type="submit" name="register" value="Envoyer" />

     </form>

     <h1>Formulaire de modifications de desserts</h1>

     <form name="inscription" action="modifierCarteDesserts.php" method="post">

          <table>

               <tr>

                    <td><label for="id_entre"><strong>N° d'entrées:</strong></label></td>

                    <td><input type="int" name="id_entrer" id="id_entrer" /></td>

               </tr>

               <tr>

                    <td><label for="desserts"><strong>Desserts:</strong></label></td>

                    <td><input type="text" name="desserts" id="desserts" required="required" /></td>

               </tr>

               <tr>

                    <td><label for="ingredients"><strong>Ingrédients:</strong></label></td>

                    <td><input type="text" name="ingredients" id="ingredients" /></td>

               </tr>

               <tr>

                    <td><label for="prix"><strong>Prix:</strong></label></td>

                    <td><input type="int" name="prix" id="prix" required="required" /></td>

               </tr>

          </table>

          <input type="submit" name="register" value="Envoyer" />

     </form>

</body>

</html>