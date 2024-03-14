<?php
include('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Ngopss</title>
  </head>
  <body>
    <nav>
      <div class="nav__header">
        <div class="logo nav__logo">
          <a href=""><img style="height: 45px; width: 200px;" src="assets/logo.png" alt="logo"></a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <span><i class="ri-menu-line"></i></span>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="offer.php">Offer</a></li>
        <li><a href="about.php">About</a></li>
      </ul>
      <div class="nav__btn">
        <button class="btn"><i class="ri-shopping-bag-fill"></i></button>
      </div>
    </nav>

    <section class="section__container special__container">
      <h2 class="section__header">Special promos and offers</h2>
      <p class="section__description">
      Seasonal and limited time promotional offers
      </p>
      <div class="offer__grid">
        <?php
        $query2 = mysqli_query($koneksi, 'SELECT * FROM penawaran limit 4');
        $result = mysqli_fetch_all($query2, MYSQLI_ASSOC);
        ?>
        <?php foreach($result as $result) : ?>

            <div class="offer__card">
              <img src="upload/<?php echo $result['gambar'] ?>" alt="..."><br>
              <p class="price"><?php echo $result['event'] ?></p>
                <h4><?php echo $result['name'] ?></h4>
               <p class="beforee">Rp. <?php echo number_format($result['price_b']); ?></p>
               <p class="after">Rp. <?php echo number_format($result['price_a']); ?></p><br>

               
               <a href="beli.php?id_menu=<?php echo $result['id']; ?>" ><button class="btn">Add to cart</button></a>

                
              </div>
              <?php endforeach; ?>
      </div>
    </section>

    <section class="section__container special__container" id="special">
    <img style="max-width: 45px; max-height: 45px; margin-inline: auto;" src="assets/logoo.png" alt="logoo" />
      <br>
      <h2 class="section__header">All offers</h2>
      <p class="section__description">
      Our ongoing promotions, including classic espresso combos, limited editions, and pastry combos.
      </p>
      <div class="special__grid">
        <?php
        $query2 = mysqli_query($koneksi, 'SELECT * FROM produk where jenis_menu = "Coffee"');
        $result = mysqli_fetch_all($query2, MYSQLI_ASSOC);
        ?>
        <?php foreach($result as $result) : ?>

            <div class="special__card">
              <img src="upload/<?php echo $result['gambar'] ?>" alt="..."><br>
              <p class="price"><?php echo $result['jenis_menu'] ?></p>
                <h4><?php echo $result['nama_menu'] ?></h4>
                <p class="price">Rp. <?php echo number_format($result['harga']); ?></p><br>
               <div class="special__footer">
               
               <a href="beli.php?id_menu=<?php echo $result['id_menu']; ?>" ><button class="btn">Add to cart</button></a>
             </div>
              </a>
                
              </div>
              <?php endforeach; ?>
      </div>
    </section>

    <section class="section__container banner__container">
      <div class="banner__card">
        <span class="banner__icon"><i class="ri-bowl-fill"></i></span>
        <h4>Order Your Food</h4>
        <p>
          Seamlessly place your food orders online with just a few clicks. Enjoy
          convenience and efficiency as you select from our diverse menu of
          delectable dishes.
        </p>
        <a href="#">
          Read more
          <span><i class="ri-arrow-right-line"></i></span>
        </a>
      </div>
      <div class="banner__card">
        <span class="banner__icon"><i class="ri-truck-fill"></i></span>
        <h4>Pick Your Food</h4>
        <p>
          Customize your dining experience by choosing from a tantalizing array
          of options. For savory, sweet, or in between craving, find the perfect
          meal to satisfy your appetite.
        </p>
        <a href="#">
          Read more
          <span><i class="ri-arrow-right-line"></i></span>
        </a>
      </div>
      <div class="banner__card">
        <span class="banner__icon"><i class="ri-star-smile-fill"></i></span>
        <h4>Enjoy Your Food</h4>
        <p>
          Sit back, relax, and savor the flavors as your meticulously prepared
          meal arrives. Delight in the deliciousness of every bite, knowing that
          your satisfaction is our top priority.
        </p>
        <a href="#">
          Read more
          <span><i class="ri-arrow-right-line"></i></span>
        </a>
      </div>
    </section>

    <footer class="footer" id="contact">
      <div class="section__container footer__container">
        <div class="footer__col">
          <div class="logo footer__logo">
          <a href=""><img style="height: 45px; width: 200px;" src="assets/logo.png" alt="logo"></a>
          </div>
          <p class="section__description">
           Brewing Moments and Sipping Memories, where every sip tells
            a story and every coffee is brew to perfection.
          </p>
        </div>
        <div class="footer__col">
          <h4>Privacy</h4>
          <ul class="footer__links">
            <li><a href="#">Terms of Use</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Cookies</a></li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Product</h4>
          <ul class="footer__links">
            <li><a href="#">Menu</a></li>
            <li><a href="#">Special Offer</a></li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Information</h4>
          <ul class="footer__links">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>
      </div>
      <div class="footer__bar">
        Copyright © 2024 Tayonpoli. All rights reserved.
      </div>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>
