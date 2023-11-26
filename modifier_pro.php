<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier catégorie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="flex">
    <?php
include_once("navbar.php");
include_once("connexion.php");

$id = $_GET["id"];
$req = mysqli_query($con, "SELECT * FROM produit WHERE id_produit = $id");
$row = mysqli_fetch_assoc($req);

if (isset($_POST["button"])) {
    $img = mysqli_real_escape_string($con, $_POST["imgp"]);
    $nom_p = mysqli_real_escape_string($con, $_POST["nom_p"]);
    $prix = mysqli_real_escape_string($con, $_POST["prix"]);
    $nom_c = mysqli_real_escape_string($con, $_POST["nom_cat"]);

    if (!empty($img) && !empty($nom_p) && !empty($prix) && !empty($nom_c)) {
        $req_update = mysqli_query($con, "UPDATE produit
            JOIN categorie ON produit.id_categorie = categorie.id_categorie
            SET produit.image_produit = '$img', produit.nom_produit = '$nom_p', produit.prix_produit = '$prix', categorie.nom_categorie = '$nom_c'
            WHERE produit.id_produit = $id");

        if ($req_update) {
       

            header("location: produit_admin.php");
        } else {
            $message = "Erreur : Produit non modifié";
        }
    } else {
        $message = "Veuillez remplir tous les champs";
    }
}
?>


<div class="form">
    <a href="produit_admin.php" class="back_btn"><img src="img/back.png"> Retour</a>
    <h2>Modifier le produit : <?= $row['nom_produit'] ?> </h2>
    <p class="erreur_message">
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
    </p>
    <form action="" method="POST">
        <label>Photo du produit</label>
        <input type="file" name="imgp" value= "<?=$row['image_produit'] ?>">
        <label>Nom produit</label>
        <input type="text" name="nom_p" value="<?= $row['nom_produit'] ?>">
        <label for="category ">Categorie</label>
        <select name="nom_cat" >
         <option selected disabled  >Choisir une categorie</option>
                <?php
                $cat = mysqli_query($con,"select * from categorie");
                while ($all_cat = mysqli_fetch_assoc ($cat)) { 
                    ?>
                    <option value="<?=$all_cat["nom_categorie"] ?>"> <?=$all_cat["nom_categorie"] ?></option>
                    <?php
                 }    
                ?>
                </select>
        <label>Prix de produit</label>
        <input type="text" name="prix" value="<?= $row['prix_produit'] ?>">
        <input type="submit" value="Modifier" name="button">
    </form>
</div>
    </div>

    
</body>
</html>