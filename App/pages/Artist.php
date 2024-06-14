<?php
@include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../Resources/images/logo.png" type="image/png" />
    <title>Artists Page</title>
    <link rel="stylesheet" href="../../Resources/css/Artist.css">
    <link rel="stylesheet" href="../../Resources/css/footer.css">
    <link rel="stylesheet" href="../../Resources/css/home.css">
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <header>
    <div class="logo">
             <a href="home.php"><img src="../../Resources/images/logo.png" alt="logo"></a>
             </div>
        <h1>Artists</h1>
        <p>Explore the talented artists in our community</p>
    </header>

    <main>
    
    <div class="container">
        <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
      <input type="search" name="search" placeholder="search artist name here" class="box">
      <input type="submit" class="btn" name="add_product" value="search">
      </form>

   </div>
   <?php
            $name = isset($_POST['search']) ? $_POST['search'] : '';
            $select = mysqli_query($conn, "SELECT * FROM items where sname='$name' ORDER BY category DESC");

            if (mysqli_num_rows($select) > 0) {
                ?>
                <div class="product-display">
                    <table class="product-display-table">
                        <thead>
                        <tr>
                            <th>name</th>
                            <th>phone number</th>
                            <th>product image</th>
                            <th>product name</th>
                            <th>category</th>
                            <th>product price</th>
                        </tr>
                        </thead>
                        <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                            <tr>
                                <td><?php echo $row['sname']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td>$<?php echo $row['price']; ?>/-</td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            <?php } else { ?>
                <div class="not-found-message">
                    <p>No records found.</p>
                </div>
            <?php } ?>
        </div>
    </main>

   
  
     
    
  <footer class="footer">
     <div class="container1">
         <div class="row">
             <div class="footer-col">
                 <h4>company</h4>
                 <ul>
                     <li><a href="about.php">about us</a></li>
                     <li><a href="#">our services</a></li>
                     <li><a href="#">privacy policy</a></li>
                     <li><a href="#">affiliate program</a></li>
                 </ul>
             </div>
             <div class="footer-col">
                 <h4>get help</h4>
                 <ul>
                     <li><a href="#">FAQ</a></li>
                     <li><a href="#">shipping</a></li>
                     <li><a href="#">returns</a></li>
                     <li><a href="#">order status</a></li>
                     <li><a href="#">payment options</a></li>
                 </ul>
             </div>
             <div class="footer-col">
                 <h4>Art gallery</h4>
                 <ul>
                     <li><a href="#">painting</a></li>
                     <li><a href="#">sketch</a></li>
                     <li><a href="#">digital art</a></li>
                     <li><a href="#">photography</a></li>
                 </ul>
             </div>
             <div class="footer-col">
                 <h4>follow us</h4>
                 <div class="social-links">
                     <a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
                     <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                     <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                     <a href="https://www.linkedin.com"><i class="fab fa-linkedin-in"></i></a>
                 </div>
             </div>
         </div>
     </div>
     <div class="container">
          <!-- <h1>Welcome to Dashboard</h1> -->
          <?php
                      if (isset($_SESSION["user"])) {
                         echo "<a href='logout.php' id='logout' class='btn btn-warning'>Logout</a>";
                          }
          ?>   
     </div>
</footer>

    <!-- <script>
        function showArtists() {
            var products = JSON.parse(localStorage.getItem('products')) || [];
            var artistsContainer = document.getElementById('artists-container');

            for (var i = 0; i < products.length; i++) {
                var product = products[i];
                var productElement = document.createElement('div');

                productElement.className = 'artist';
                productElement.innerHTML = `
                    <p>Artist: ${product.name}</p>
                    <p>Email: ${product.email}</p>
                    <p>Phone: ${product.phone}</p>
                `;
                artistsContainer.appendChild(productElement);
            }
        }

        showArtists();
    </script> -->
</body>

</html>
