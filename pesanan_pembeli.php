<?php  
include('koneksi.php');
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }else{
?>
<?php 
if(empty($_SESSION["pesanan"]) OR !isset($_SESSION["pesanan"]))
{
  echo "<script>alert('You arent order anything yet');</script>";
  echo "<script>location= 'menu_pembeli.php'</script>";
}
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
    <nav class="navbar navbar-expand-lg cool">
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
      <div class="jumbotron jumbotron-fluid text-center cool">
        <div class="container">
          <h1 style="font-size:65px" class="display-4"><span class="font-weight-normal">INDONESIAN FOOD</span></h1>
          <hr>
        </div>
      </div>
  <!-- Akhir Jumbotron -->

  <!-- Menu -->
    <div class="container cool">
      <div class="judul-pesanan mt-5">
       
        <h3 class="text-center font-weight-bold">Your Order</h3>
        
      </div>
      <table class="table table-borderless" id="example">
        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Order Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        <tbody>
            <?php $nomor=1; ?>
            <?php $totalbelanja = 0; ?>
            <?php foreach ($_SESSION["pesanan"] as $id_menu => $jumlah) : ?>

            <?php 
              include('koneksi.php');
              $ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_menu='$id_menu'");
              $pecah = $ambil -> fetch_assoc();
              $subharga = $pecah["harga"]*$jumlah;
            ?>
          <tr class="botborder">
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah["nama_menu"]; ?></td>
            <td>Rp. <?php echo number_format($pecah["harga"]); ?></td>
            <td>x <?php echo $jumlah; ?></td>
            <td>Rp. <?php echo number_format($subharga); ?></td>
            <td>
              <a href="hapus_pesanan.php?id_menu=<?php echo $id_menu ?>" class="badge badge-danger font-weight-normal">Delete</a>
            </td>
          </tr>
            <?php $nomor++; ?>
            <?php $totalbelanja+=$subharga; ?>
            <?php endforeach ?>
        </tbody>
        <tfoot>
          <tr style="font-size:18px">
            <th colspan="4">Total Payment</th>
            <th colspan="2">Rp. <?php echo number_format($totalbelanja) ?></th>
          </tr>
        </tfoot>
      </table><br>
      <form  class="text-right" method="POST" action="">
        <a href="menu_pembeli.php" class="btn btn-sm btn-light shadow"><i class="fas fa-arrow-left"></i> See Menu</a>
        <button class="btn btn-dark btn-sm shadow" name="konfirm">Order Confirmation <i class="fas fa-check"></i></button>
      </form>        

      <?php 
      if(isset($_POST['konfirm'])) {
          $tanggal_pemesanan=date("Y-m-d");

          // Menyimpan data ke tabel pemesanan
          $insert = mysqli_query($koneksi, "INSERT INTO pemesanan (tanggal_pemesanan, total_belanja) VALUES ('$tanggal_pemesanan', '$totalbelanja')");

          // Mendapatkan ID barusan
          $id_terbaru = $koneksi->insert_id;

          // Menyimpan data ke tabel pemesanan produk
          foreach ($_SESSION["pesanan"] as $id_menu => $jumlah)
          {
            $insert = mysqli_query($koneksi, "INSERT INTO pemesanan_produk (id_pemesanan, id_menu, jumlah) 
              VALUES ('$id_terbaru', '$id_menu', '$jumlah') ");
          }          

          // Mengosongkan pesanan
          unset($_SESSION["pesanan"]);

          // Dialihkan ke halaman nota
          echo "<script>alert('Sucessful Ordered!');</script>";
          echo "<script>location= 'menu_pembeli.php'</script>";
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