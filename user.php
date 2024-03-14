<?php  
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }else{
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <title>IndonesianFood</title>
  </head>
  <body>

  <!-- Navbar -->
      <nav class="navbar navbar-expand-lg">
        <div class="container">
        <a class="navbar-brand" href="admin.php"><strong>IndonesianFood</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link mr-4 mt-2" href="user.php">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4 mt-2" href="menu_pembeli.php">MENU</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4 mt-2" href="pesanan_pembeli.php">ORDER LIST</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4 mt-2" href="logout.php">LOGOUT</a>
            </li>
          </ul>
        </div>
       </div> 
      </nav>
  <!-- Akhir Navbar -->

  <!-- Jumbotron -->
      <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
          <h1 class="display-4"><span class="font-weight-normal">INDONESIAN FOOD</span></h1>
          <hr>
        </div>
      </div>
  <!-- Akhir Jumbotron -->
  
  <!-- Menu -->    
  <div class="container">
        <div class="judul text-justify mt-5">
          <p class="overview">Overview</p>
          <h3 style="font-size:56px" class="font-weight-bold">A Little Information For Our Guest.</h3>
          <hr>
          <h5>Restaurant Indonesian food has been established since 2022, which is located in Jababeka. We provide a variety of Indonesian specialties
              from various regions with quality food made from fresh and good quality ingredients.
              The Indonesian Food Restaurant is open every day for lunch and dinner from 10am to 11pm. The website that we have can be accessed anytime
              anywhere so it can save time for buyers not having to queue to order food. So for fans
              of Indonesian food with a luxurious taste and at affordable prices, you can order our food through this website.</h5>
        </div>

        <div class="row mb-3 mt-1 ">
          <div class="col-md-6 d-flex justify-content-end">
              <div style="margin-top:-0.5rem" class="card-img-overlay text-left">
               <a href="menu_pembeli.php" class="btn btn-primary wlbtn gradient font-weight-bold">List Menu</a>
               <a style="margin-left:20px" href="pesanan_pembeli.php" class="btn btn-primary wlbtn gradient font-weight-bold">Ordered List</a>
              </div>
            </div>
          </div>
  <!-- Akhir Menu -->

  <!-- Awal Footer -->
      <hr class="footer">
      <div class="container">
        <div class="row footer-body">
          <div class="col-md-6">
          <div style="font-size:16px" class="copyright icon">
            <strong>Copyright</strong> <i class="far fa-copyright"></i>2022 -  Designed by Group 11</p>
          </div>
          </div>

          <div class="col-md-6 d-flex justify-content-end">
          <div class="icon-contact icon">
          <label class="font-weight-bold">Follow Us </label>
          <a href="#"><i class="fab fa-facebook mr-3 ml-3" data-toggle="tooltip" title="Facebook"></i></a>
          <a href="#"><i class="fab fa-instagram mr-3" data-toggle="tooltip" title="Instagram"></i></a>
          <a href="#"><i class="fab fa-twitter" data-toggle="tooltip" title="Twitter"></i></a>
        </div>
          </div>
        </div>
      </div>
  <!-- Akhir Footer -->
  </body>
</html>
<?php } ?>