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

    <title>Indonesian Food</title>
  </head>
  <body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
        <div class="container">
        <a class="navbar-brand text-dark" href="user.php"><strong>IndonesianFood</strong></a>
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
        <div class="row mt-3">

          <?php 

          include('koneksi.php');

          $query = mysqli_query($koneksi, 'SELECT * FROM produk');
          $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            

          ?>

          <?php foreach($result as $result) : ?>

          <div class="col-md-3 mt-4">
            <div class="card brder-dark shadow">
              <img src="upload/<?php echo $result['gambar'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 style="font-size:18px" class="card-title"><?php echo $result['nama_menu'] ?></h5>
               <label class="card-text harga">Rp. <?php echo number_format($result['harga']); ?></label><br>
                <a href="beli.php?id_menu=<?php echo $result['id_menu']; ?>" class="btn btn-light btn-sm btn-block "><i class="fas fa-plus"></i> Add to Order List</a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
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