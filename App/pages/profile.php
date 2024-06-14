<?php
session_start();
@include 'config.php';
     
     $email=$_SESSION['email'];
     $select = mysqli_query($conn, "SELECT * FROM items WHERE email='$email'");
     if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM items WHERE id = $id");
        header('location:profile.php');
        echo "Deleted successfully";
        exit();
     };
   //   if(isset($_SESSION['id'])){
   //    $id = $_SESSION['id'];
   //    mysqli_query($conn, "DELETE FROM users WHERE id = $id");
   //    header('location:profile.php');
   //    echo "Deleted successfully";
   //    exit();
   // };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="../../Resources/css/footer.css">
    <link rel="stylesheet" href="../../Resources/css/home.css">

    <link rel="stylesheet" href="style1.css">
    <script>
        function confirmDelete(event) {
            if (!confirm("Are you sure?")) {
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
<header id="header" class="header" style="color:black;">
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
                <!-- <li class="get"><a href="profile.php" id="deleteAccountLink" onclick="confirmDelete(event)">Delete Account</a></li>                 -->
            </ul>
           </div>
          </nav>
    </header>
<div class="product-display">
   <table class="product-display-table" style="margin-top:100px;">
      <thead>
      <tr>
         <th>Artist name</th>
         <th>phone number</th>
         <th>product image</th>
         <th>product name</th>
         <th>category</th>
         <th>product price</th>
         <th>Action</th>

      </tr>
      </thead>
      
      <?php 
      if(mysqli_num_rows($select)>0){
      while($row = mysqli_fetch_assoc($select)){ ?>
      <tr>
         <td><?php echo $row['sname'];?></td>
         <td><?php echo $row['phone'];?></td>
         <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
         <td><?php echo $row['name']; ?></td>
         <td><?php echo $row['category']; ?></td>
         <td>$<?php echo $row['price']; ?>/-</td>
         <td>
               <a href="admin_update.php?edit=<?php echo $row['id']; $_SESSION['id']=$row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="profile.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
      </tr>
   <?php } }
   else{?>
    <td style="a-items:center;"><?php echo "no recorded data";?></td>
<?php
   }?>
   </table>
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
  <script src="../../Resources/js/profile.js"></script>
    

</body>
</html>
