<!doctype html>

<html>

<head>

    <meta charset="utf-8" />

    <link rel="stylesheet" href="">

    <title>formulaire de photos</title>

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

        p{
            color: red;
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

    <p><a href="photosRetour.php" title="Vous ne le regretterez pas !">Page photos</a></p>

    <table>

        <caption>

            <h1>Les photos du Chef</h1>

        </caption>

        <thead> <!-- En-tête du tableau -->

            <tr>

                <th>N°</th>

                <th>Titre</th>

                <th>photos</th>

            </tr>

        </thead>

        <tbody>

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
                <tr>

                    <td><?php echo $donnees['id_images']; ?></td>

                    <td><?php echo $donnees['photo']; ?></td>

                    <td><?php echo $donnees['titre']; ?></td>

                </tr>

            <?php

            }

            $reponse->closeCursor(); // Termine le traitement de la requête

            ?>

        </tbody>

    </table>

<p>ENVOIS DES PHOTOS DANS LE DOSSIER "PHOTOS" AVEC FILEZILLA (ensuite, inscription dans la BDD)</p>

    <h1>Formulaire d'inscriptions du chemin la photo</h1>

    <form name="inscription" action="enregistrerPhotos.php" method="post">

        <table>

            <tr>

                <td><label for="photo"><strong>Photos:</strong></label></td>

                <td><input type="text" name="photo" id="photo" required="required" /></td>

            </tr>

            <tr>

                <td><label for="titre"><strong>titres:</strong></label></td>

                <td><input type="text" name="titre" id="titre" required="required" /></td>

            </tr>

        </table>

        <input type="submit" name="register" value="Envoyer" />

    </form>

    <h1>Formulaire de modifications</h1>

    <form name="inscription" action="modifierPhotos.php" method="post">

        <table>

            <tr>

                <td><label for="id_images"><strong>N° d'entrées:</strong></label></td>

                <td><input type="int" name="id_images" id="id_images" required="required" /></td>

            </tr>

            <tr>

                <td><label for="photo"><strong>Photos:</strong></label></td>

                <td><input type="text" name="photo" id="photo" required="required" /></td>

            </tr>

            <tr>

                <td><label for="titre"><strong>Titres:</strong></label></td>

                <td><input type="text" name="titre" id="titre" required="required" /></td>

            </tr>

        </table>

        <input type="submit" name="register" value="Envoyer" />

    </form>

</body>

</html>