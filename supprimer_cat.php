<?php
include_once("connexion.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $req = mysqli_query($con," DELETE FROM categorie WHERE id_categorie = $id ") ;
if($req ) {

    header("location: cat_admin.php");

}


}


?>