<?php
include_once("connexion.php");
$id=$_GET["id"];
$req = mysqli_query($con,"delete from panier where id_panier = $id");
if($req ) 
header("location: panier.php");

?>