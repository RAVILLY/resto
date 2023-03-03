<!doctype html>

<html>

<head>

    <meta charset="utf-8" />

    <link rel="stylesheet" href="menuClientRetour.css">

    <title>Le menu</title>

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

    <h1>MENU DU QUAI ANTIQUE</h1>

    <main>

        <fieldset>

            <legend>Le Chef vous propose aujourd'hui !</legend>


            <?php

            try {
                $bdd = new PDO('mysql:host=localhost;dbname=restau_database', 'root');
            } catch (Exception $e) {
                die('Erreur:' . $e->getMessage());
            }

            $reponse = $bdd->query('SELECT * FROM menu ORDER BY id_menu ');

            // On affiche chaque entrée une à une

            while ($donnees = $reponse->fetch()) {

            ?>

                <p>

                <h3>Entrée + Plat ou Plat + Dessert</h3><?php echo $donnees['prixPetit']; ?>€

                </p>

                <p>

                <h3>Entrée + Plat + Dessert</h3><?php echo $donnees['prixGrand']; ?>€

                </p>

                <p>
                <h4>Entrées</h4><br>

                <?php echo $donnees['entre']; ?>

                </p>

                <p>
                <h4>Plats</h4><br>

                <?php echo $donnees['plats']; ?>

                </p>

                <p>
                <h4>Desserts</h4><br>

                <?php echo $donnees['desserts']; ?>

                </p>


            <?php

            }

            $reponse->closeCursor(); // Termine le traitement de la requête

            ?>

        </fieldset>

    </main>

</body>

</html>