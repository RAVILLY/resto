

  <p><a href="pagePhotos.php" > Retour à la page photos</a></p>

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
