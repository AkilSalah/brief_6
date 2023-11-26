<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='maiin.css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <script src='main.js'></script>
    
    
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PLANTS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ABOUTE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">PRODUCT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">CONTACT</a>
        </li>
      </ul>
    </div>
  </div>
  ferff
</nav>
<div class="home p-0" >
<div class="position-relative "  >
      <img src="img/arrangement-jardin-potager-espace-copie.jpg" class="img-fluid" alt="...">
        <h1 class="position-absolute top-50  start-50 translate-middle text-black">THE WORLD OF PLANTS</h1>
        <button class="btn btn-success position-absolute top-50 mt-5 start-50 translate-middle-x" style="transform: translateX(50%);">More</button>
</div>
</div>
</section>
    <section class="sec2">
      <div class="container">
        <h3 class="text-center mt-3">Bienvenue dans votre espace dédié à l'amour des plantes sur Plants ! </h3>
        <div class="row  d-flex mt-5 ">
          <div class="col-xl-6 col-lg-6  col-md-9 col-sm-10 ">
            <img src="img/petits-cactus-fond-mur-blanc.jpg" alt="" class="w-100">
          </div>

          <div class="text_btn col-xl-5 col-lg-5  col-sm-10 pt-5 d-flex flex-column text-center">
            <p class="txt">
            Bienvenue sur Plants - votre destination en ligne dédiée à la fascination des plantes. Chez nous, la passion pour la verdure rencontre l'expertise, offrant un espace où les amoureux de la nature peuvent s'instruire, s'inspirer et se connecter. Explorez nos ressources soigneusement élaborées, des guides pratiques aux articles captivants, et rejoignez une communauté florissante de personnes partageant la même passion. Chez Plants, notre mission est de cultiver la curiosité botanique et de faire fleurir votre amour pour le monde végétal. Bienvenue dans notre jardin virtuel, où la découverte et l'épanouissement botanique sont au cœur de tout ce que nous faisons.
            </p>
            <button class="btn btn-success top-50 mt-5 start-50 translate-middle-x" style="transform: translateX(50%);">More</button>

          </div>
        </div>
    </section>
<?php 
include_once("connexion.php");

?>

 <section style="background-color: #eee;">
     <h1 class="Product text-center mt-4"> Nos Produits</h1>

     <nav class="navbar ">
      <div class="container-fluid  ">
<?php
$req = mysqli_query($con,"select * from categorie");
while ($row = mysqli_fetch_assoc($req)) :?>
    
        <a class="btn fw-bold btn-outline-dark " href="?id_categorie = <?= $row['id_categorie'] ?>"><?=$row["nom_categorie"]?></a><?php endwhile; ?>

        <form class="d-flex" action="" method="GET">
          <input class="form-control me-2" id="searchInput" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit" id="searchButton">Search</button>
        </form>
      </div>
    </nav>
<?php
if(isset($_GET["id_categorie"])){
    $id_cat =$_GET["id_categorie"];
$produit = mysqli_query($con, "SELECT * FROM produit WHERE id_categorie = '$id_cat'");}
while ($row = mysqli_fetch_assoc($produit)) :?>


  <div class="text-center row container py-5">
    <div class="row">
      <div class="col-lg-4 col-md-12 mb-4">
        <div class="card">
          <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
            data-mdb-ripple-color="light">
            <img src="<?=$row["image_produit"]?>"class="w-100" >
            <a href="#!">
              <div class="mask">
             
              </div>
              <div class="hover-overlay">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </div>
            </a>
          </div>
          <div class="card-body">
            <a href="" class="text-reset">
              <h5 class="card-title mb-3"><?=$row["nom_produit"]?></h5>
            </a>
            <a href="" class="text-reset">
              <p><?=$row ["nom_categorie"] ?></p>
            </a>
            <h6 class="mb-3"><?=$row ["prix_produit"] ?></h6>
          </div>
        </div>
      </div>

      
    </div>

</div>
<?php  endwhile; ?>

</section>


</body>
</html>