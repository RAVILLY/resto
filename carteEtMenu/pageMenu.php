<!doctype html>

<html>

<head>

    <meta charset="utf-8" />

    <link rel="stylesheet" href="">

    <title>Menu Administration</title>

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

    <div class="entrer">

        <table>

            <caption>
                <h1>MENUS DU JOUR</h1>
            </caption>


            <thead> <!-- En-tête du tableau -->

                <tr>

                    <th>N°</th>

                    <th>ENTREES</th>

                    <th>PLATS</th>

                    <th>DESSERTS</th>

                    <th>Entrée + Plat<br> ou <br>Plat + Desserts</th>

                    <th></th>

                    <th>Entrée + Plat + Desserts</th>
                </tr>

            </thead>

            <tbody>

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
                    <tr>

                        <td><?php echo $donnees['id_menu']; ?></td>

                        <td><?php echo $donnees['entre']; ?></td>

                        <td><?php echo $donnees['plats']; ?></td>

                        <td><?php echo $donnees['desserts']; ?></td>

                        <td><?php echo $donnees['prixPetit']; ?></td>

                        <td></td>

                        <td><?php echo $donnees['prixGrand']; ?></td>

                    </tr>

                <?php
                }
                $reponse->closeCursor(); // Termine le traitement de la requête


                ?>

            </tbody>

        </table>
    </div>

    </tbody>

    </table>
    </div>

    <h1>Formulaire d'inscriptions du menu du jour</h1>

    <form name="inscription" action="enregistrerMenu.php" method="post">

        <table>

            <tr>

                <td><label for="entre"><strong>Entrées:</strong></label></td>
                <td><input type="text" name="entre" id="entre" required="required" /></td>

            </tr>

            <tr>

                <td><label for="plats"><strong>Plats:</strong></label></td>
                <td><input type="text" name="plats" id="plats" required="required" /></td>

            </tr>

            <tr>

                <td><label for="desserts"><strong>Desserts:</strong></label></td>
                <td><input type="text" name="desserts" id="desserts" required="required" /></td>

            </tr>

            <tr>

                <td><label for="prixPetit"><strong>Prix:</strong></label></td>
                <td><input type="int" name="prixPetit" id="prixPetit" /></td>

            </tr>

            <tr>

                <td><label for="prixGrand"><strong>Prix:</strong></label></td>
                <td><input type="int" name="prixGrand" id="prixGrand" /></td>

            </tr>
        </table>

        <input type="submit" name="register" value="Envoyer" />


    </form>





    <h1>Formulaire de modifications</h1>


    <form name="inscription" action="modifierMenu.php" method="post">

        <table>
               <tr>

                    <td><label for="id_menu"><strong>N° d'entrées:</strong></label></td>
                    <td><input type="int" name="id_menu" id="id_menu" required="required" /></td>
               </tr>

            <tr>

                <td><label for="entre"><strong>Entrées:</strong></label></td>
                <td><input type="text" name="entre" id="entre" required="required" /></td>

            </tr>

            <tr>

                <td><label for="plats"><strong>Plats:</strong></label></td>
                <td><input type="text" name="plats" id="plats" required="required" /></td>

            </tr>

            <tr>

                <td><label for="desserts"><strong>Desserts:</strong></label></td>
                <td><input type="text" name="desserts" id="desserts" required="required" /></td>

            </tr>

            <tr>

                <td><label for="prixPetit"><strong>Prix:</strong></label></td>
                <td><input type="int" name="prixPetit" id="prixPetit" /></td>

            </tr>

            <tr>

                <td><label for="prixGrand"><strong>Prix:</strong></label></td>
                <td><input type="int" name="prixGrand" id="prixGrand" /></td>

            </tr>
        </table>

        <input type="submit" name="register" value="Envoyer" />


    </form>



</body>


</html>