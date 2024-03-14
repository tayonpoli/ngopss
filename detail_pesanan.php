<?php 
    include('koneksi.php');
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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <title>Indonesian Food</title>
  </head>
  <body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
        <div class="container cool">
        <a class="navbar-brand text-dark" href="admin.php"><strong>IndonesianFood</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link mr-4 mt-2" href="admin.php">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4 mt-2" href="daftar_menu.php">MENU</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4 mt-2" href="pesanan.php">ORDER LIST</a>
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
        <div class="container cool">
          <h1 class="display-4"><span class="font-weight-normal">INDONESIAN FOOD</span></h1>
          <hr>
        </div>
      </div>
  <!-- Akhir Jumbotron -->

  <!-- Menu -->
    <div class="container cool">
      <div class="judul-pesanan mt-5">
       
        <h3 class="text-center font-weight-bold">CUSTOMER ORDERED LIST</h3>
        
      </div>
      <table class="table table-borderless" id="example">
        <thead class="thead-light">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Order ID</th>
            <th scope="col">Order Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
          </tr>
        </thead>
        <tbody>
          <?php $nomor=1; ?>
          <?php $totalbelanja = 0; ?>
          <?php 
              $ambil = $koneksi->query("SELECT * FROM pemesanan_produk JOIN produk ON pemesanan_produk.id_menu=produk.id_menu 
                WHERE pemesanan_produk.id_pemesanan='$_GET[id]'");
           ?>
           <?php while ($pecah=$ambil->fetch_assoc()) { ?>
           <?php $subharga1=$pecah['harga']*$pecah['jumlah']; ?>
          <tr class="botborder">
            <th scope="row"><?php echo $nomor; ?></th>
            <td><?php echo $pecah['id_pemesanan_produk']; ?></td>
            <td><?php echo $pecah['nama_menu']; ?></td>
            <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td>
              Rp. <?php echo number_format($pecah['harga']*$pecah['jumlah']); ?>
            </td>
          </tr>
          <?php $nomor++; ?>
          <?php $totalbelanja+=$subharga1; ?>
          <?php } ?>
        </tbody>
         <tfoot>
          <tr style="font-size: 18px">
            <th colspan="5">Total Payment</th>
            <th>Rp. <?php echo number_format($totalbelanja) ?></th>
          </tr>
        </tfoot>
      </table><br>
      
      <form class="text-right" method="POST" action="">
        <a href="pesanan.php" class="btn btn-light btn-sm shadow"><i class="fas fa-arrow-left"></i> Back</a>
        <button class="btn btn-dark btn-sm shadow" name="bayar">Payment Confirmation <i class="fas fa-check"></i></button>
      </form>  
      <?php 
        if(isset($_POST["bayar"]))
        {
          echo "<script>alert('Payment Sucessful !');</script>";
          echo "<script>location= 'pesanan.php'</script>";
        }
      ?>
     
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
    <script>
      $(document).ready(function() {
          $('#example').DataTable();
      } );
    </script>
  </body>
</html>
<?php } ?>