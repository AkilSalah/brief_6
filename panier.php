<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Panier</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src='main.js'></script>
</head>

<body>
    <?php
    include_once("connexion.php");
    session_start();
    if(!isset($_GET["id-pro"])){
        echo"noooo commande";
    }
   
    if (isset($_GET["id-pro"])) {
        $id_pro = $_GET["id-pro"];
        $iduser = $_SESSION["id_utilisateur"];
        $req_panier = mysqli_query($con, "INSERT INTO panier (`id_utilisateur`, `id_produit`) VALUES ($iduser,  $id_pro ) ");
        if($req_panier){
            header("location: client.php");
            exit();
        }else{
            echo "WARNING";
        }
    }
    ?>


    <section class="h-100 h-custom" style="background-color: #d2c9ff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                            <?php
                                                $user =mysqli_query($con,"SELECT COUNT(*) AS nombre_de_lignes FROM panier");
                                                if($user){
                                                    $result=mysqli_fetch_assoc($user);
                                                }   
                                                $product_info =mysqli_query($con,"select * from panier join produit on produit.id_produit=panier.id_produit ");
                                                if($product_info)
                                                    $result_info=mysqli_fetch_assoc($product_info);
                                                ?>
                                            <h6 class="mb-0 text-muted"><?=$result["nombre_de_lignes"]?> Piéces</h6>
                                        </div>
                                        <hr class="my-4">

                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img src="img/<?=$result_info["image_produit"]?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h6 class="text-muted">Produit : </h6>
                                                <h6 class="text-black mb-0"><?=$result_info["nom_produit"]?></h6>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h6 class="text-muted">Quantité : </h6>
                                                <?php 
                                                $quantit 
                                                ?>
                                                <h6 class="text-black mb-0"><?=$result_info["nom_produit"]?></h6>
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h6 class="text-muted">Prix : </h6>

                                                <h6 class="mb-0"><?=$result_info["prix_produit"]?></h6>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>

                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="#!" class="text-body">
                                                    <a href="client.php" class="back_btn text-decoration-none text-dark"><img src="img/back.png" width="20px"> Retour</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                        <hr class="my-4">
                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Total price</h5>
                                            <h5>€ 137.00</h5>
                                        </div>

                                        <button type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Register</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>