<?php
require './config.php';

if (isset($_GET['type'])) {

  $type = $_GET['type'];

  $sql = "SELECT * FROM book WHERE category = '$type'";
  $result = $conn->query($sql);
} else {
  $sql = "SELECT * FROM book ORDER BY title";
  $result = $conn->query($sql);
}
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
  <title>Books List</title>
</head>

<body>
  <!-- Navigation -->
  <nav class="nav">
    <div class="navigation container">
      <div class="logo">
        <h1><a href="./index.php" class="nav-link">Damayanthi Book Shop</a></h1>
      </div>

      <div class="menu">
        <div class="top-nav">
          <div class="logo">
            <h1><a href="./index.php" class="nav-link">Damayanthi Book Shop</a></h1>
          </div>
          <div class="close">
            <i class="bx bx-x"></i>
          </div>
        </div>

        <ul class="nav-list">
          <li class="nav-item">
            <a href="./index.php" class="nav-link">Home</a>
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
        </ul>
      </div>

      <div class="hamburger">
        <i class="bx bx-menu"></i>
      </div>
    </div>
  </nav>

  <!-- All Products -->
  <section class="section all-products" id="products">
    <div class="top container">
      <h1>
        <?php if (isset($_GET['type'])) {
          $type = $_GET['type'];
          echo $type;
        } else {
          echo 'All Books';
        }
        ?>
      </h1>
      <!-- <form>
        <select id="sort">
          <option value="1">Defualt Sorting</option>
          <option value="2">Sort By Price</option>
          <option value="3">Sort By Date</option>
          <option value="4">Sort By Sale</option>
        </select>
        <span><i class='bx bx-chevron-down'></i></span>
      </form> -->
    </div>

    <div class="product-center container">
      <?php if ($result->num_rows > 0) { ?>
        <?php while ($row = $result->fetch_assoc()) { ?>
          <a href="product-details.php?id=<?php echo $row['id']; ?>">
            <div class="product">
              <div class="product-header">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" alt="">
              </div>
              <div class="product-footer">
                <h3><?php echo $row['title'] ?></h3>
                <br>
                <h4 class="price">$<?php echo $row['price'] ?></h4>
              </div>
            </div>
          </a>
        <?php } ?>
      <?php } ?>
    </div>
  </section>

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
            damayanthibookshop@gmail.com
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
  <!-- Custom Script -->
  <script src="./js/index.js"></script>
</body>

</html>