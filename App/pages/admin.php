<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: adminpass.php");
 }
@include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
    <link rel="stylesheet" href="../../Resources/css/footer.css">
    <link rel="stylesheet" href="../../Resources/css/admin.css">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
     <div class="categories">
        <div class="title-wrapper">
                    <h2 class="h2 section-title">Admin page</h2>
        
                    <ul class="filter-btn-list">
                    <li class="filter-btn-item">
                        <a href="#product">
                            <button class="filter-btn" data-filter-btn="Painting">list</button>
                        </a>
                    </li> 
        
                    <!-- <li class="filter-btn-item">
                        <button class="filter-btn active" data-filter-btn="all" onclick="showContent('product')">Lists</button>
                    </li>
                    
                    <li class="filter-btn-item">
                        <button class="filter-btn" data-filter-btn="Painting" onclick="showContent('accounts')">Accounts</button>
                    </li>      -->
        
                        <!-- <li class="filter-btn-item">
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
         -->
                    </ul>
                    </div>
        <?php
    $select = mysqli_query($conn, "SELECT * FROM wait");
    
    if(isset($_GET['add'])){
        $id = $_GET['add'];
        $get=mysqli_query($conn,"SELECT name,email FROM wait where id='$id'");
        if (mysqli_num_rows($get) > 0) {
            
            while ($row = mysqli_fetch_assoc($get)) {
                $name = $row['name'];
                $email =$row['email'];; 
        
                $sql_insert = "INSERT INTO community (name, email) VALUES ('$name', '$email')";
                if (mysqli_query($conn, $sql_insert)) {
                    echo "Record inserted successfully into community_table";
                } else {
                    echo "Error inserting record: " . mysqli_error($conn);
                }
            }
        } else {
            echo "No records found in wait_table";
        }
        mysqli_query($conn, "DELETE FROM wait WHERE id = $id");
        
       
        header('location:admin.php');
        echo "Deleted successfully";
        exit();
     };
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM wait WHERE id = $id");
        header('location:admin.php');
        echo "Deleted successfully";
        exit();
     };     
?>


<div class="product-display" id="product" >
   <table class="product-display-table" style="margin-top:100px;">
      <thead>
      <tr>
         <th>Name</th>
         <th>Email</th>
         <th>Message</th>
         <th>Action</th>

      </tr>
      </thead>
      
      <?php 
      if(mysqli_num_rows($select)>0){
      while($row = mysqli_fetch_assoc($select)){ ?>
      <tr>
         <td><?php echo $row['name'];?></td>
         <td><?php echo $row['email'];?></td>
         <td><?php echo $row['message']; ?></td>
         <td>
               <a href="admin.php?add=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit</a>
               <a href="admin.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
      </tr>
   <?php } }
   else{?>
    <td style="a-items:center;"><?php echo "no recorded data";?></td>
<?php
   }?>
   </table>
</div>
<!-- <div id="accounts"  class="product-display">
    <h1>Accounts list</h1>
    <table class="product-display-table" style="margin-top:100px;">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <?php 
        $answer=mysqli_query($conn, "SELECT full_name,email FROM users");
      if(mysqli_num_rows($answer)>0){
      while($row = mysqli_fetch_assoc($answer)){ ?>
      <tr>
         <td><?php echo $row['full_name'];?></td>
         <td><?php echo $row['email'];?></td>
         <td>
               <a href="admin.php?delete1=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
      </tr>
   <?php } }
   else{?>
    <td style="a-items:center;"><?php echo "no recorded data";?></td>
<?php
   }?>
    </table>
</div> -->


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
                        if (isset($_SESSION["admin"])) {
                           echo "<a href='adminout.php' id='logout' class='btn btn-warning'>Logout</a>";
                            }
            ?>   
       </div>
  </footer>


</body>
</html>
<!-- <script>
    function showContent(contentId) {
        var contents = document.getElementsByClassName("content");
        for (var i = 0; i < contents.length; i++) {
            contents[i].style.display = "none";
        }
        document.getElementById(contentId).style.display = "block";
    }
</script> -->