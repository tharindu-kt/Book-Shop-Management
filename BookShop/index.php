<?php
require './config.php';

$sql = "SELECT * FROM book ORDER BY price DESC LIMIT 4";
$result = $conn->query($sql);

$sqllatest = "SELECT * FROM book ORDER BY title DESC LIMIT 8";
$resultlatest = $conn->query($sqllatest);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="./images/download.png">
  <!-- Box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="./css/styles.css" />
  <title>Damayanthi Book Shop</title>
</head>

<body>
  <!-- Header -->
  <header id="home" class="header" style="background-image: url('./images/14_09_2020_12_19_07_0316568.jpeg');">
    <!-- Navigation -->
    <nav class="nav">
      <div class="navigation container">
        <div class="logo">
          <h1><a href="./index.php" class="nav-link">Damayanthi Book Shop</a></h1>
        </div>

        <div class="menu">
          <div class="top-nav">
            <div class="logo">
              <h1>Dmayanthi Book Shop</h1>
            </div>
            <div class="close">
              <i class="bx bx-x"></i>
            </div>
          </div>

          <ul class="nav-list">
            <li class="nav-item">
              <a href="#home" class="nav-link scroll-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="./product.php" class="nav-link">Products</a>
            </li>
            <li class="nav-item">
              <a href="#footer" class="nav-link scroll-link">About</a>
            </li>
            <li class="nav-item">
              <a href="#footer" class="nav-link scroll-link">Contact</a>
            </li>
            <li class="nav-item">
              <a href="./signin.php" class="nav-link">Account</a>
            </li>
            <!-- <li class="nav-item">
              <a href="cart.php" class="nav-link icon"><i class="bx bx-shopping-bag"></i></a>
            </li> -->
          </ul>
        </div>

        <!-- <a href="cart.php" class="cart-icon">
          <i class="bx bx-shopping-bag"></i>
        </a> -->

        <div class="hamburger">
          <i class="bx bx-menu"></i>
        </div>
      </div>
    </nav>

    <!-- Hero -->
    <!-- <img src="./images/banner.png" alt="" class="hero-img" /> -->

    <div class="hero-content">
      <h2><span class="discount">25% </span> SALE OFF</h2>
      <h1>
        <span>Online</span>
        <span>Sale</span>
      </h1>
      <a class="btn" href="./product.php">shop now</a>
    </div>
  </header>

  <!-- Main -->
  <main>
    <section class="section">
      <div class="advert-center container">
        <div class="advert-box">
          <a href="product.php?type=Classic">
            <div class="dotted">
              <div class="content">
                <h2>
                  Classic <br />
                  Books
                </h2>
                <h4>Worlds Best Writers</h4>
              </div>
            </div>
            <img src="./images/imgbin-book-cover-old-a-few-old-books-pile-of-books-dAZwey53Qz1yjdj7YZUC5b3ry-removebg-preview.png" alt="">
          </a>
        </div>

        <div class="advert-box">
          <a href="product.php?type=Comic">
            <div class="dotted">
              <div class="content">
                <h2>
                  Comic <br />
                  Books
                </h2>
                <h4>Worlds Best Writers</h4>
              </div>
            </div>
            <img src="./images/19-196453_smashing-book-icon-comic-book-icon-png-removebg-preview.png" alt="">
          </a>
        </div>

        <div class="advert-box">
          <a href="product.php?type=Sci-Fi">
            <div class="dotted">
              <div class="content">
                <h2>
                  Sci-Fi <br />
                  Books
                </h2>
                <h4>Worlds Best Writers</h4>
              </div>
            </div>
            <img src="./images/35f1f68120d1839df148fad97dc68591-removebg-preview.png" alt="">
          </a>
        </div>

        <div class="advert-box">
          <a href="product.php?type=Short Story">
            <div class="dotted">
              <div class="content">
                <h2>
                  Short Story <br />
                  Books
                </h2>
                <h4>Worlds Best Writers</h4>
              </div>
            </div>
            <img src="./images/pngtree-grey-real-stereo-book-element-image_1189380-removebg-preview.png" alt="">
          </a>
        </div>

        <div class="advert-box">
          <a href="product.php?type=Biographies">
            <div class="dotted">
              <div class="content">
                <h2>
                  Biographies and <br />
                  Autobiographies
                </h2>
                <h4>Worlds Best Writers</h4>
              </div>
            </div>
            <img src="./images/6837487_variousbookswithspectaclesonatable1252713_jpeg2364c65c1c81a844e127b30027976e48-removebg-preview.png" alt="">
          </a>
        </div>

        <div class="advert-box">
          <a href="product.php?type=Historical">
            <div class="dotted">
              <div class="content">
                <h2>
                  Historical <br />
                  Books
                </h2>
                <h4>Worlds Best Writers</h4>
              </div>
            </div>
            <img src="./images/vintage-books-with-paper-scroll-feather-ink-pot-colored-sketch-decorative-concept-vector-illustration_1284-2997-removebg-preview.png" alt="">
          </a>
        </div>
      </div>
    </section>

    <!-- Featured -->
    <section class="section featured">
      <div class="title">
        <h1>Featured Books</h1>
      </div>

      <div class="product-center container">

        <?php if ($result->num_rows > 0) { ?>
          <?php while ($row = $result->fetch_assoc()) { ?>
            <a href="product-details.php?id=<?php echo $row['id']; ?>">
              <div class="product">
                <div class="product-header">
                  <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" alt="">
                  <!-- <ul class="icons">
                  <span><i class="bx bx-heart"></i></span>
                  <a href="cart.php"> <span><i class="bx bx-shopping-bag"></i></span>
                  </a>
                  <span><i class="bx bx-search"></i></span>
                </ul> -->
                </div>
                <div class="product-footer">
                  <!-- <a href="product-details.php"> -->
                  <h3><?php echo $row['title'] ?></h3>
                  <!-- </a> -->
                  <!-- <div class="rating">
                  <i class="bx bxs-star"></i>
                  <i class="bx bxs-star"></i>
                  <i class="bx bxs-star"></i>
                  <i class="bx bxs-star"></i>
                  <i class="bx bx-star"></i>
                </div> -->
                  <br>
                  <h4 class="price">$<?php echo $row['price'] ?></h4>
                </div>
              </div>
            </a>
          <?php } ?>
        <?php } ?>

      </div>
    </section>

    <!--Latest -->
    <section class="section featured">
      <div class="title">
        <h1>Latest Books</h1>
      </div>

      <div class="product-center container">

        <?php if ($resultlatest->num_rows > 0) { ?>
          <?php while ($rowlatest = $resultlatest->fetch_assoc()) { ?>
            <a href="product-details.php?id=<?php echo $rowlatest['id']; ?>">
              <div class="product">
                <div class="product-header">
                  <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rowlatest['image']); ?>" alt="">
                  <!-- <ul class="icons">
                  <span><i class="bx bx-heart"></i></span>
                  <a href="cart.php"> <span><i class="bx bx-shopping-bag"></i></span>
                  </a>
                  <span><i class="bx bx-search"></i></span>
                </ul> -->
                </div>
                <div class="product-footer">
                  <!-- <a href="product-details.php"> -->
                  <h3><?php echo $rowlatest['title'] ?></h3>
                  <!-- </a> -->
                  <!-- <div class="rating">
                  <i class="bx bxs-star"></i>
                  <i class="bx bxs-star"></i>
                  <i class="bx bxs-star"></i>
                  <i class="bx bxs-star"></i>
                  <i class="bx bx-star"></i>
                </div> -->
                  <br>
                  <h4 class="price">$<?php echo $rowlatest['price'] ?></h4>
                </div>
              </div>

            <?php } ?>
          <?php } ?>
            </a>
      </div>
    </section>

    <!-- Product Banner -->
    <section class="section">
      <div class="product-banner">
        <div class="left">
          <img src="./images/17fatbooks-mobileMasterAt3x.jpg" alt="" />
        </div>
        <div class="right">
          <div class="content">
            <h2><span class="discount">25% </span> SALE OFF</h2>
            <h1>
              <span>Collect Your</span>
              <span>Favourite Books</span>
            </h1>
            <a class="btn" href="#">shop now</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials -->
    <section class="section">
      <div class="testimonial-center container">
        <div class="testimonial">
          <span>&ldquo;</span>
          <p>
            Comment
          </p>
          <div class="rating">
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bx-star"></i>
          </div>
          <div class="img-cover">
            <img src="./images/flat-business-man-user-profile-avatar-icon-vector-4333097-removebg-preview.png" alt="" />
          </div>
          <h4>Name</h4>
        </div>
        <div class="testimonial">
          <span>&ldquo;</span>
          <p>
            Comment
          </p>
          <div class="rating">
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bx-star"></i>
            <i class="bx bx-star"></i>
          </div>
          <div class="img-cover">
            <img src="./images/flat-business-man-user-profile-avatar-icon-vector-4333097-removebg-preview.png" alt="" />
          </div>
          <h4>Name</h4>
        </div>
        <div class="testimonial">
          <span>&ldquo;</span>
          <p>
            Comment
          </p>
          <div class="rating">
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bx-star"></i>
          </div>
          <div class="img-cover">
            <img src="./images/flat-business-man-user-profile-avatar-icon-vector-4333097-removebg-preview.png" alt="" />
          </div>
          <h4>Name</h4>
        </div>
      </div>
    </section>

    <!-- Brands -->
    <section class="section">
      <div class="brands-center container">
        <div class="brand">
          <img src="./images/build-your-brand-removebg-preview.png" alt="" />
        </div>
        <div class="brand">
          <img src="./images/build-your-brand-removebg-preview.png" alt="" />
        </div>
        <div class="brand">
          <img src="./images/build-your-brand-removebg-preview.png" alt="" />
        </div>
        <div class="brand">
          <img src="./images/build-your-brand-removebg-preview.png" alt="" />
        </div>
        <div class="brand">
          <img src="./images/build-your-brand-removebg-preview.png" alt="" />
        </div>
        <div class="brand">
          <img src="./images/build-your-brand-removebg-preview.png" alt="" />
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer id="footer" class="section footer">
    <div class="container">
      <div class="footer-container">
        <div class="footer-center">
          <h3>EXTRAS</h3>
          <a href="#">Brands</a>
          <a href="#">Gift Certificates</a>
          <a href="#">Affiliate</a>
          <a href="#">Specials</a>
          <a href="#">Site Map</a>
        </div>
        <div class="footer-center">
          <h3>INFORMATION</h3>
          <a href="#">About Us</a>
          <a href="#">Privacy Policy</a>
          <a href="#">Terms & Conditions</a>
          <a href="#">Contact Us</a>
          <a href="#">Site Map</a>
        </div>
        <div class="footer-center">
          <h3>MY ACCOUNT</h3>
          <a href="#">My Account</a>
          <a href="#">Order History</a>
          <a href="#">Wish List</a>
          <a href="#">Newsletter</a>
          <a href="#">Returns</a>
        </div>
        <div class="footer-center">
          <h3>CONTACT US</h3>
          <div>
            <span>
              <i class="fas fa-map-marker-alt"></i>
            </span>
            Address
          </div>
          <div>
            <span>
              <i class="far fa-envelope"></i>
            </span>
            dmayanthibookshop@gmail.com
          </div>
          <div>
            <span>
              <i class="fas fa-phone"></i>
            </span>
            Tel No
          </div>
          <div>
            <span>
              <i class="far fa-paper-plane"></i>
            </span>
            City, SL
          </div>
        </div>
      </div>
    </div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- GSAP -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script> -->
  <!-- Custom Script -->
  <script src="./js/index.js"></script>
</body>

</html>