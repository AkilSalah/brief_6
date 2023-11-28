<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Rôle</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='role.css'>
    <script src='main.js'></script>
</head>
<body> 
<?php 
include_once("connexion.php");
session_start();
if(isset($_SESSION["email"])) {
  $email = $_SESSION["email"];
}

if(isset($_POST["client_submit"])) {
  $p = 2;
  $requete = mysqli_query($con, " UPDATE utilisateur SET id_role = '$p' WHERE email = '$email'");
  if($requete) {
        header("location:login.php");
        exit();
    } else {
        echo "WARNING";
    }
} elseif(isset($_POST["admin_submit"])) {
  $p = 1;
  $requete = mysqli_query($con, " UPDATE utilisateur SET id_role = '$p' WHERE email = '$email'");
    if($requete) {
        header("location:login.php"); 
        exit();
    } else {
        echo "WARNING";
  }
} 
?>
   <div class="text-center " >
    <img src="img/logo-removebg-preview.png" alt="" style="width: 10vw; " >
    <h3 >Bonjour ! Veuillez choisir votre rôle avant d'accéder à la plateforme.</h3>
   </div>

 <div class=" d-flex justify-content-center gap-5 mt-5 ">
            <div class="card  " style="width: 18rem;">
            <img src="img/admin.png" class="card-img-top m-auto w-50" alt="...">
        <div class="card-body">
          <h5 class="card-title text-center mt-3">A D M I N</h5>
          <div class="text-center">
          <form action="" method="post">
              <button type="submit" name="admin_submit" class="btn btn-success mt-4">Admin Go</button>
          </form>
      </div>

        </div>
      </div>

      <div class="card " style="width: 18rem;">
        <img src="img/R.png" class="card-img-top m-auto w-50" alt="...">
        <div class="card-body">
          <h5 class="card-title text-center mt-3">C L I E N T</h5>
          <div class="text-center">
         <form action="" method="post">
        <button type="submit" name="client_submit" class="btn btn-success mt-4 ">Client Go</button>
        </form>
          </div>
          
        </div>
      </div>
    </div>

</body>
</html>