<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajouter Categorie</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

</head>

<body>
    <div class="flex">
        <?php
        include_once("navbar.php");
        include_once("connexion.php");
        ?>
        <div class="form">
            <?php

            if (isset($_POST["button"]) && isset($_POST["nom_cat"]) ) {
                
                $nom_cat = $_POST["nom_cat"];
                $nom_cat = mysqli_real_escape_string($con, $nom_cat);
                $req = mysqli_query($con, "INSERT INTO categorie (nom_categorie) VALUES ('$nom_cat')");

                if ($req) {
                  $message=   "La catégorie a été ajoutée avec succès.";
                } else {
                  $message=   "Erreur : La catégorie n'a pas pu être ajoutée.";
                }
            }else{
                $message = "Veuillez remplir tous les champs !";
            }
            ?>
            <h2>Ajouter une catégorie </h2>
            <p class="erreur_message">
            <?php
            if(isset($message)){
                echo "".$message."";
            }
            ?>
            </p>
            <form action="" method="POST">
                <label>Nom de catégorie</label>
                <input type="text" name="nom_cat">
                <input type="submit" value="Ajouter" name="button">
            </form>
            <table>

                <tr id="items">
                    <th>Id catégorie</th>
                    <th>Nom catégorie</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>

                <?php
                $result = mysqli_query($con, "SELECT * FROM categorie");
                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id_categorie'] . "</td>";
                    echo "<td>" . $row['nom_categorie'] . "</td>";
                    echo "<td><a class='table-link' href='modifier_cat.php?id=".$row['id_categorie']."'><img src='img/pen.png'></a></td>";
                    echo "<td><a class='table-link' href='supprimer_cat.php?id=".$row['id_categorie']."'><img src='img/trash.png'></a></td>";
                    echo "</tr>";
                }

                ?>

            </table>

        </div>


    </div>



</body>

</html>