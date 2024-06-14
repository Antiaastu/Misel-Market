<?php
session_start();
@include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ምስል market</title>
    <link rel="shortcut icon" type="image/png" href="../../Resources/images/logo.png">
    <link rel="stylesheet" href="../../Resources/css/home.css">
    <link rel="stylesheet" href="../../Resources/css/footer.css">
    <link rel="stylesheet" href="../../Resources/css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
/* Button style */
.button1 {
  display: inline-block;
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 8px;
}

/* Button hover effect */
.button1:hover {
  background-color: #45a049; /* Darker green */
}

/* Remove default link styling */
a {
  text-decoration: none;
}
.sold {
            color: red;
            font-weight: bold;
        }

</style>
</head>
<body>
    <header id="header" class="header">
          <div class="logo">
             <a href="home.php"><img src="../../Resources/images/logo.png" alt="logo"></a>
             <div class="logo-text">ምስል market</div>
          </div>
          <nav class="nav-bar">
            <div class="main-nav">
            <ul>
                <li><a href="about.php">Why Misel?</a></li>
                <li><a href="#">How it works</a></li>
                 
                <li><a href="Artist.php">Artists</a></li>
                <li><a href="contact.php">Contact us</a></li>
                </ul>
            </div>
            
            <div class="right">
                <ul>
                    <?php
                        if (!isset($_SESSION["user"])) {
                           echo "<li><a href='login.php'><i class='fa-regular fa-user'></i>Login</a></li>";
                            }
                            
            ?>      
            
                <li class="get"><a href="index.php">Sell Art</a></li>
                <?php
                        if (isset($_SESSION["user"])) {
                            echo "<li><a href='profile.php'><i class='fas fa-user-circle fa-2x' style='margin-left: 50px;'></i></a></li>";
                        }
            ?>   
            </ul>
           </div>
          </nav>
    </header>
    
       
        <div class="slideshow">
            <div class="first"></div>
            <div class="first"></div>
            <div class="first"></div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            
        </div>
        <div class="slogan">
            <pre><h2>Discover 
            the Beauty of Art</h2></pre>
        </div>

        <div class="catagories">

            <div class="title-wrapper">
              <h2 class="h2 section-title">Trending Items</h2>
  
              <ul class="filter-btn-list">
  
                <li class="filter-btn-item">
                  <a href="#all-products">
                  <button class="filter-btn active" data-filter-btn="all">Recents</button></a>
                </li>
  
                <li class="filter-btn-item">
                  <a href="../pages/painting.php">
                      <button class="filter-btn" data-filter-btn="Painting">Painting</button>
                  </a>
              </li>            
  
                <li class="filter-btn-item">
                  <a href="../pages/Sketch.php">
                  <button class="filter-btn" data-filter-btn="Sketches">Sketches</button></a>
                </li>
  
                <li class="filter-btn-item">
                  <a href="../pages/Photography.php">
                  <button class="filter-btn" data-filter-btn="Photography">Photography</button></a>
                </li>
  
                <li class="filter-btn-item">
                  <a href="../pages/Digital_Art.php">
                  <button class="filter-btn" data-filter-btn="Digital">Digital Art</button></a>
                </li>
  
                <li class="filter-btn-item">
                  <a href="../pages/Religious.php">
                  <button class="filter-btn" data-filter-btn="Religious">Religious</button></a>
                </li>
  
              </ul>
            </div>

            <div id="why">
                <div class="wrapper left-padding right-padding">
                <h3 class="title-lg os-animation animated fadeIn" data-os-animation="fadeIn">Why Misel</h3>
                <ul class="stats grid-3">
                <li>
                <strong>98%</strong><br><br><br><br>
                <span>of clients<br> would <br>recommend <br>Misel</span>
                </li>
                <li>
                <strong>90%</strong><br><br><br><br>
                <span>of rotating <br>clients renew <br>their program<br> year after year</span>
                </li>
                <li>
                <strong>1 in 5</strong><br><br><br><br>
                <span>clients <br>expand their <br>collection<br> each year</span>
                </li>
                </ul>
                <a class="cta-animated" href="about.php">Learn More</a>
                </div>
            </div>
            <?php
    //  $paint="Painting";
     $select = mysqli_query($conn, "SELECT * FROM items ORDER BY id DESC LIMIT 5");
        ?>
        <h1>Recently Added Items</h1>
        <div id="all-products" class="purchase-section" >
    <?php while ($row = mysqli_fetch_assoc($select)) { ?>
        <div class="box">
            <div class="box-img" style="background-image: url('uploaded_img/<?php echo $row['image']; ?>');"></div>
            <div class="box-content">
                <h2><?php echo $row['name']; ?></h2>
                <p>Artist: <?php echo $row['sname']; ?></p>
                <p>Phone: <?php echo $row['phone']; ?></p>
                <p>Category: <?php echo $row['category']; ?></p>
                <p>Price: <?php echo $row['price']; ?> birr</p>
                <!-- <p><a href="index.html" class="button1">Buy Now</a></p> -->
                <?php if ($row['status'] == 'available') { ?>
                    <p><a href="index1.php?buy=<?=$row['id'];?>&& price=<?=$row['price'];?>" class="button1">Buy Now</a></p>
                <?php } ?> 
                <?php if ($row['status'] == 'sold') { ?>
                    <p class="sold">Sold<i class="fas fa-times"></i></p>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>
            
        
        <!-- <div class="purchase-section">   
                <section id="all-products">     
                    <div class="box1 box"><div class="box-content">
                    <div class="box-img1" style="background-image: url('../../Resources/images/item1.jpg');"></div>
                        <p class="price">1000.00 ETB</p>
                        <p class="category">Painting</p>
                        <p><a href="painting.html" class="see-more">See More</a></p>
                    </div>
                    </div>
                    <div class="box2 box">
                        <div class="box-content">
                        <div class="box-img2" style="background-image: url('../../Resources/images/item2.jpg');"></div>
                            <p class="price">1000.00 ETB</p>
                            <p class="category">Photography</p>
                            <p><a href="Digital_Art.html" class="see-more">See More</a></p>
                        </div>
                    </div>
                        <div class="box3 box"><div class="box-content">
                        <div class="box-img3" style="background-image: url('../../Resources/images/item3.jpg');"></div>
                        <p class="price">1000.00 ETB</p>
                            <p class="category">Sketches</p>
                            <p><a href="Sketch.html" class="see-more">See More</a></p>
                        </div>
                    </div>
                    <div class="box4 box"><div class="box-content">
                        <div class="box-img4" style="background-image: url('../../Resources/images/item4.jpg');"></div>
                    <p class="price">1000.00 ETB</p>
                        <p class="category">Painting</p>
                        <p><a href="Photography.html" class="see-more">See More</a></p>
                    </div>
                    </div>
                    <div class="box5 box">
                        <div class="box-content">
                        <div class="box-img5" style="background-image: url('../../Resources/images/item7.jpg');"></div>
                        <p class="price">1000.00 ETB</p>
                            <p class="category">Digital Art</p>
                            <p><a href="Religious.html" class="see-more">See More</a></p>
                        </div>
                    </div>
                </section>
                </div> -->
            
                    </div>
                </div>
            
                </div>
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
    

    <script src="../../Resources/js/home.js"></script>


    <!-- <section id="featured">
        <h2>Featured Artworks</h2>
        <div class="artworks">
            <div class="artwork">
                <img src="artwork1.jpg" alt="Artwork 1">
                <h3>Artwork Title</h3>
                <p>Artist Name</p>
            </div>
            <div class="artwork">
                <img src="artwork2.jpg" alt="Artwork 2">
                <h3>Artwork Title</h3>
                <p>Artist Name</p>
            </div>
        </div>
        <a href="#explore" class="btn">View More Artworks</a>
    </section>
    
    <section id="explore">
        <h2>Explore Art Categories</h2>
        <ul class="categories">
            <li><a href="#">Paintings</a></li>
            <li><a href="#">Sculptures</a></li>
            <li><a href="#">Photography</a></li>
        </ul>
    </section>
    
    <section id="newsletter">
        <h2>Subscribe to Our Newsletter</h2>
        <p>Stay updated on new arrivals, promotions, and more.</p>
        <form action="#" method="post">
            <input type="email" name="email" placeholder="Enter your email address" required>
            <button type="submit" class="btn">Subscribe</button>
        </form>
    </section>
    
    <footer class="footer">
        <p>&copy; 2024 ArtConnect. All rights reserved.</p>
        <div class="social-links">
            <a href="#" class="icon">Facebook</a>
            <a href="#" class="icon">Twitter</a>
            <a href="#" class="icon">Instagram</a>
        </div>
    </footer> -->
</body>
</html>
