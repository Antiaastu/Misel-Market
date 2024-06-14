<?php
session_start();
@include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/ionicons/css/ionicons.min.css">
    <link rel="icon" href="../images/logo.png" type="image/png" />
    <title>ምስል Market</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../Resources/css/contact.css">
    <link rel="stylesheet" href="../../Resources/css/footer.css">
 
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    
    

</head>
<body>
    <header class="header">
        <div class="logo">
           <a href="home.php"><img src="../../Resources/images/logo.png" alt="logo"></a>
           <div class="logo-text">ምስል market</div>
          
        </div>
        <nav class="nav-bar">
          <div class="main-nav">
          <ul>
              <li><a href="about.php">Why Misel?</a></li>
              <li><a href="#">How it works</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Artists</a></li>
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
              <li class="get"><a href="login.php">Get started</a></li>
          </ul>
         </div>
        </nav>
  </header>
    <div class="container">
        <?php 
            if (isset($_POST["send"])) {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $message = $_POST["message"];
                $image = $_FILES['image']['name']; // Get the name of the uploaded file
                $image_tmp_name = $_FILES['image']['tmp_name'];
                $image_folder = 'uploaded_image/' . $image;
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $mess[]='please enter valid email';
                 }
                
                if(empty($name) || empty($email) || empty($image) || empty($message)){
                    $mess[] = 'please fill out all';
                 }
                else{
                    $insert = "INSERT INTO wait(name, email, image, message) VALUES('$name','$email','$image','$message')";
                    $upload = mysqli_query($conn, $insert);
                    if ($upload) {
                        move_uploaded_file($image_tmp_name, $image_folder);
                        $mess[] = 'message successfully sent';
                    } else {
                        $mess[] = 'could not send the message';
                    }
                }
                
            };
            
            
            if (isset($mess)) {
                foreach ($mess as $m) {
                    echo '<span class="message">' . $m . '</span>';
                  
                }
            };
        ?>
        
        <h2>Contact Us</h2>
        <form id="contact-form" action="contact.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="image">National Id:</label>
                <input type="file" accept="image/png, image/jpeg, image/jpg" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message"></textarea>
            </div>
            
            <button type="submit" name="send" class="send"> Send</button>
            
        </form>
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
                           echo "<a href='logout.php' class='btn btn-warning'>Logout</a>";
                            }
            ?>   
            
            </div>
  </footer>
  <script src="../../Resources/js/about.js"></script>
    </body>
</html>