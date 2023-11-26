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
include_once "connexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $req = mysqli_query($con, "SELECT * FROM categorie WHERE id_categorie = $id");
    $row = mysqli_fetch_assoc($req);

    if (isset($_POST['button'])) {
        $nom = mysqli_real_escape_string($con, $_POST['nom']);

        if (!empty($nom)) {
            $req_update = mysqli_query($con, "UPDATE categorie SET nom_categorie = '$nom' WHERE id_categorie = $id");

            if ($req_update) {
                header("location: cat_admin.php");
            } else {
                $message = "Erreur : Catégorie non modifiée";
            }
        } else {
            $message = "Veuillez remplir le champ du nom de la catégorie";
        }
    }
} else {
    $message = "ID de catégorie manquant.";
}
?>

<div class="form">
    <a href="cat_admin.php" class="back_btn"><img src="img/back.png"> Retour</a>
    <h2>Modifier la catégorie : <?= $row['nom_categorie'] ?> </h2>
    <p class="erreur_message">
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
    </p>
    <form action="" method="POST">
        <label>Nom catégorie</label>
        <input type="text" name="nom" value="<?= $row['nom_categorie'] ?>">
        <input type="submit" value="Modifier" name="button">
    </form>
</div>

    </div>

    
</body>
</html>