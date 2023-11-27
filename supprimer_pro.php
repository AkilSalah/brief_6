<?php
include_once("connexion.php");
$id=$_GET["id"];
$req = mysqli_query($con,"delete from produit where id_produit = $id");
if($req ) 
header("location: produit_admin.php");

?>