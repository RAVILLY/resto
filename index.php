<!doctype html>

<html>

<head>

  <meta charset="utf-8" />

  <link rel="stylesheet" href="index.css">

  <title>Restaurant le Quai Antique</title>

  <meta name="description" content=" A la découverte de la gastronomie Savoyarde.
  Un voyage culinaire pour les palais. Les gourmets en seront très étonnés!!! " />

</head>

<body>

  <div id='global'>

    <header>

      <a href="admin/login.php" class="bouton1">Administration</a>

      <h1>QUAI ANTIQUE</h1>

    </header>

    <main>

      <fieldset>

        <legend>Quelques spécialités de la maison</legend>

        <?php

        try {
          $bdd = new PDO('mysql:host=localhost;dbname=images_resto', 'root');
        } catch (Exception $e) {
          die('Erreur:' . $e->getMessage());
        }


        $reponse = $bdd->query('SELECT * FROM images ORDER BY id_images ');

        // On affiche chaque entrée une à une

        while ($donnees = $reponse->fetch()) {

        ?>

          <table>

            <thead>

              <tr>

                <th><?php echo $donnees['titre']; ?></th>

              </tr>

            </thead>

            <tbody>

              <tr>

                <th><img src="<?php echo $donnees['photo']; ?>" width="180" height="120" /></th>

              </tr>

            </tbody>

          </table>

        <?php

        }

        $reponse->closeCursor(); // Termine le traitement de la requête

        ?>

      </fieldset>

    </main>

    <aside>

      <a href="carteUtilisateurretourPHP.php" class="carte">La carte</a>

      <a href="menuUtilisateurRetourPHP.php" class="menus">Menus</a>

      <a href="clients/enregistrementClient.php" class="reservation">Réservations</a>

    </aside>

    <footer>

      <p>Horaires d'houverture</p>

      <table>

        <thead>

          <tr>

            <th>Jours</th>

            <th>Midi</th>

            <th>Soirs</th>

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

              <td>
                <p id="gauche"><?php echo $donnees['jour']; ?></p>
              </td>

              <td>
                <p id="ingredients"><?php echo $donnees['midi']; ?></p>
              </td>

              <td>
                <p id="centre"><?php echo $donnees['soir']; ?></p>
              </td>

            </tr>

          <?php

          }

          $reponse->closeCursor(); // Termine le traitement de la requête

          ?>

        </tbody>

      </table>

    </footer>

  </div>

</body>

</html>