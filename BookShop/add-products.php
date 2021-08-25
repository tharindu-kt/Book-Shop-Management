<?php
include "config.php";

if (isset($_POST['add'])) {

  $title = $_POST['title'];
  $category = $_POST['category'];
  $author = $_POST['author'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $description = $_POST['description'];
  $fileName = basename($_FILES["image"]["name"]);
  $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
  $image = $_FILES['image']['tmp_name'];
  $imgContent = addslashes((file_get_contents($image)));

  $sql = "INSERT INTO book(title, category, author, price, quantity, description, image) 
    VALUES ('$title','$category','$author','$price','$quantity', '$description', '$imgContent')";

  $result = $conn->query($sql);

  if ($result == TRUE) {
    header("location: add-products.php");
  } else {
    echo "Error:" . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="./images/download.png">

  <!-- Box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

  <!-- Glidejs -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css" />
  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="./css/styles.css" />
  <title>Admin View</title>

  <script>
    function validateForm() {
      var title = document.forms["editForm"]["title"].value;
      var author = document.forms["editForm"]["author"].value;
      var price = document.forms["editForm"]["price"].value;
      var quantity = document.forms["editForm"]["quantity"].value;
      var category = document.forms["editForm"]["category"].value;
      var description = document.forms["editForm"]["description"].value;

      if (title == "") {
        alert("Title is required! ");
        return false;
      }

      if (author == "") {
        alert("Author Name is required! ");
        return false;
      }

      if (price == "") {
        alert("Price is required! ");
        return false;
      }

      if (quantity == "") {
        alert("Quantity is Required! ");
        return false;
      }

      if (description == "") {
        alert("Description is Required! ");
        return false;
      } else if (description.length > 200) {
        alert("Maximum character limit is 200 !! ");
        return false;
      }

      if (category == "") {
        alert("Choose the Category! ");
        return false;
      }
    }
  </script>

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
            <h1>Damayanthi Book Shop</h1>
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
  <br><br><br>

  <!-- Product Details -->
  <section class="section product-detail">
    <form class="editForm" name="editForm" onsubmit="return validateForm()" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <div class="details container-md">
        <div class="left">
          <div class="main">
            <img src=""><br><br><br><br><br><br><br>
            <label>Book Image:</label>
            <input type="file" name="image">
          </div>
        </div>
        <div class="right">
          <input type="text" name="title" id="title" placeholder="Title">
          <input type="text" name="author" id="author" placeholder="Author"><br>
          <input type="number" name="price" id="price" placeholder="Price">
          <input type="number" name="quantity" id="quantity" placeholder="Quantity">
          <div>
            <select class="category" name="category">
              <option value="Select" selected disabled>Category</option>
              <option value="Classic">Classic</option>
              <option value="Comic">Comic</option>
              <option value="Sci-Fi">Sci-Fi</option>
              <option value="Short Story">Short Story</option>
              <option value="Biographies">Biographies</option>
              <option value="Historical">Historical</option>
            </select>
            <textarea name="description" placeholder="Book Description"></textarea>
            <input type="submit" name="add" value="Add">
          </div>
        </div>
      </div>
    </form>
  </section>
  <br><br><br>

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
          <a hre History</a>
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