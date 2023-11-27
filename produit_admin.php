<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajouter produit</title>
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
            if (isset($_POST["button"]) && !empty($_POST["nom_cat"]) && !empty($_POST["nom_pro"]) && !empty($_POST["prix_pro"])) {
                $img_pro = $_POST["imgp"];
                $id_cat = $_POST["nom_cat"];
                $nom_pro = $_POST["nom_pro"];
                $prix_pro = $_POST["prix_pro"];

                $id_cat = mysqli_real_escape_string($con, $id_cat);
                $prix_pro = mysqli_real_escape_string($con, $prix_pro);
                $nom_pro = mysqli_real_escape_string($con, $nom_pro);
                $img_pro = mysqli_real_escape_string($con, $img_pro);

                $req = mysqli_query($con, "INSERT INTO produit (image_produit, nom_produit, id_categorie, prix_produit) VALUES ('$img_pro','$nom_pro','$id_cat','$prix_pro')");

                if ($req) {
                    $message = "Le produit a été ajouté avec succès.";
                    header("Location: produit_admin.php");
                    exit();
                } else {
                    $message = "Erreur : Le produit n'a pas pu être ajouté.";
                }
            } else {
                $message = "Veuillez remplir tous les champs !";
            }
            ?>
            <h2>Ajouter un produit </h2>
            <p class="erreur_message">
                <?php
                if (isset($message)) {
                    echo "" . $message . "";
                }
                ?>
            </p>
            <form action="" method="POST">
                <label>Photo du produit</label>
                <input type="file" name="imgp" required>
                <label>Nom de produit</label >
                <input type="text" name="nom_pro" required>
                <label>Prix de produit</label>
                <input type="number" name="prix_pro">
                <label for="category">Categorie</label>
                <select id="category" name="nom_cat">
                    <option selected disabled>Choisir une categorie</option>
                    <?php
                    $cat = mysqli_query($con, "select * from categorie");
                    while ($all_cat = mysqli_fetch_assoc($cat)) {
                    ?>
                        <option value="<?= $all_cat["id_categorie"] ?>"> <?= $all_cat["nom_categorie"] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <input type="submit" value="Ajouter" name="button">
            </form>
            <table>
                <tr id="items">
                    <th>Photo du produit</th>
                    <th>Nom produit</th>
                    <th>Nom de catégorie</th>
                    <th>Prix de produit</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                <?php
                $result = mysqli_query($con, "SELECT * FROM produit join categorie on produit.id_categorie = categorie.id_categorie ");

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <div class="image" >
                        <td><img src="img/<?= $row["image_produit"] ?>" alt=""></td>
                        </div>
                        <td><?= $row["nom_produit"] ?> </td>
                        <td><?= $row["nom_categorie"] ?> </td>
                        <td><?= $row["prix_produit"] ?> </td>
                        <td><a class='table-link' href='modifier_pro.php?id= <?=$row['id_produit'] ?>'><img src='img/pen.png'></a></td>
                        <td><a class='table-link' href='supprimer_pro.php?id= <?=$row['id_produit'] ?>'><img src='img/trash.png'></a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        
    </div>
</body> 

</html>
