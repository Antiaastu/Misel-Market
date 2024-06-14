
<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
@include 'config.php';
function setCookieForUser($username) {
   $expire = time() + (30 * 24 * 60 * 60);
   setcookie("user", $username, $expire, "/");
}

if (isset($_SESSION["user"])) {
   setCookieForUser($_SESSION["user"]);
}
// if(isset($_COOKIE['user'])) {
//    echo "User cookie is set. User: " . $_COOKIE['user'];
// } else {
//    echo "User cookie is not set.";
// }
if(isset($_POST['add_product'])){
   $name=$_POST['name'];
   $_SESSION['name']=$name;
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $category=$_POST['category'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $message[]='please enter valid email';
   }
   if(empty($product_name) || empty($product_price) || empty($product_image) || empty($name) || empty($email) || empty($phone) || empty($category)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO items(sname, email, phone, name, price, category, image) VALUES('$name','$email','$phone','$product_name', '$product_price','$category', '$product_image')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'new product added successfully';
      }else{
         $message[] = 'could not add the product';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM items WHERE id = $id");
   header('location:index.php');
   exit();
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="../../Resources/css/home.css">
   <link rel="stylesheet" href="../../Resources/css/footer.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="style1.css">

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
<header id="header" class="header">
          <div class="logo">
             <a href="home.php"><img src="../../Resources/images/logo.png" alt="logo"></a>
          </div>     
</header>
   
<div class="container">

   <div class="admin-product-form-container">

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
         <h3>add a new product</h3> 
            <input type="text" name="name" placeholder="enter your name" class="box"><br><br>
            <input type="email" name="email" placeholder="enter your email" class="box"><br><br>
            <input type="tel" name="phone" placeholder="enter your phone number" class="box"><br><br>
         <input type="text" placeholder="enter product name" name="product_name" class="box">
         <input type="number" placeholder="enter product price" name="product_price" class="box">
         
         <select name="category" id="category" class="box">
                <option value="Painting">Painting</option>
                <option value="Sketch">Sketch</option>
                <option value="Photography">Photography</option>
                <option value="Digital_Art">Digital Art</option>
                <option value="Religious">Religious</option>
         </select>
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>

   </div>
   <!-- <?php
    $name=$_POST['name'];
   $select = mysqli_query($conn, "SELECT * FROM items where sname='$name'");
   
   ?> -->
   <!-- <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>name</th>
            <th>phone number</th>
            <th>product image</th>
            <th>product name</th>
            <th>category</th>
            <th>product price</th>
            <th>action</th>
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
            <td>
               <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="index.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div> -->

</div>
<footer class="footer">
  	 <div class="container">
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
  	 				<li><a href="painting.php">painting</a></li>
  	 				<li><a href="Sketch.php">sketch</a></li>
  	 				<li><a href="Digital_art.php">digital art</a></li>
  	 				<li><a href="Photography.php">photography</a></li>
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
                           echo "<a href='logout.php' class='btn btn-warning'>Logout</a>";
                            }
            ?>   
            
            </div>
  </footer>

</body>
</html>