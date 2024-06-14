<?php
@include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Religious Gallery</title>
    <link rel="icon" href="../../Resources/images/logo.png" type="image/png" />
    <link rel="stylesheet" href="../../Resources/css/painting.css">
    <link rel="stylesheet" href="style1.css"> 
    <link rel="stylesheet" href="../../Resources/css/footer.css">
    <link rel="stylesheet" href="../../Resources/css/home.css">
    <style>

.button1 {
  display: inline-block;
  background-color: #4CAF50; 
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

.button1:hover {
  background-color: #45a049; 
}

a {
  text-decoration: none;
}

</style>

</head>
<body>
    
    <header>
    <div class="logo">
             <a href="home.php"><img src="../../Resources/images/logo.png" alt="logo"></a>
             </div>
        <h1>Art Gallery</h1>
        <p>Welcome to our Painting Collection</p>
    </header>

    <main>
<?php
     $religious="Religious";
$select = mysqli_query($conn, "SELECT * FROM items where category='$religious'");
?>
<div class="product-display">
   <table class="product-display-table">
      <thead>
      <tr>
         <th>Artist name</th>
         <th>phone number</th>
         <th>product image</th>
         <th>product name</th>
         <th>category</th>
         <th>product price</th>
      </tr>
      </thead>
      <?php while($row = mysqli_fetch_assoc($select)){ ?>
      <tr>
         <td><?php echo $row['sname'];?></td>
         <td><?php echo $row['phone'];?></td>
         <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
         <td><?php echo $row['name']; ?></td>
         <td><?php echo $row['category']; ?></td>
         <td>$<?php echo $row['price']; ?>/-</td>
         <td><p><a href="index1.php" class="button1">Buy Now</a></p></td>
      </tr>
   <?php } ?>
   </table>
</div>

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

    <!-- <footer>
        <p>&copy; 2024 Art Gallery. All rights reserved.</p>
    </footer>
    <script>
        function showProducts() {
            var products = JSON.parse(localStorage.getItem('products')) || [];
            var paintingsContainer = document.getElementById('painting-container');
    
            for (var i = 0; i < products.length; i++) {
                var product = products[i];
                var productElement = document.createElement('div');
    
                if (product.category === 'Painting') {
                    productElement.className = 'painting';
                    productElement.innerHTML = `
                        <img src="${product.photo}" alt="${product.description}" style="max-width: 100%;">
                        <p>Price: ${product.price} ETB</p>
                        <button onclick="showDetails(${i})">See more</button>
                        <div id="details${i}"></div>
                    `;
                    paintingsContainer.appendChild(productElement);
                }
            }
        }
    
        showProducts();
    
        function showDetails(index) {
            var products = JSON.parse(localStorage.getItem('products')) || [];
    
            var product = products[index];
            var detailsContainer = document.getElementById(`details${index}`);
            detailsContainer.innerHTML = `
                <p>Artist: ${product.name}</p>
                <p>Email: ${product.email}</p>
                <p>Phone: ${product.phone}</p>
                <p>Location: ${product.location}</p>
                <p>Description: ${product.description}</p>
                <p>Price: ${product.price} ETB</p>
                <p>Social Media: ${product.socialMedia}</p>
            `;
        }
    </script> -->
</body>
</html>
