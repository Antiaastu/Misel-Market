<?php

@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){
   $name=$_POST['name'];
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
      $message[] = 'please fill out all!';    
   }
   else{
      $update_data = "UPDATE items SET sname='$name', email='$email', phone='$phone' ,name='$product_name', price='$product_price', category='$category',image='$product_image'  WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:profile.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM items WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>
      <input type="text" name="name" placeholder="enter your name" value="<?php echo $row['sname']; ?>" class="box"><br><br>
      <input type="email" name="email" placeholder="enter your email" value="<?php echo $row['email']; ?>" class="box"><br><br>
      <input type="tel" name="phone" placeholder="enter your phone number" value="<?php echo $row['phone']; ?>" class="box"><br><br>
      <input type="text" class="box" name="product_name" value="<?php echo $row['name']; ?>" placeholder="enter the product name">
      <input type="number" min="0" class="box" name="product_price" value="<?php echo $row['price']; ?>" placeholder="enter the product price">
      <select name="category" id="category" class="box" value="<?php echo $row['category']; ?>">
                <option value="Painting">Painting</option>
                <option value="Sketch">Sketch</option>
                <option value="Photography">Photography</option>
                <option value="Digital_Art">Digital Art</option>
                <option value="Religious">Religious</option>
         </select>
      <input type="file" class="box" name="product_image"  accept="image/png, image/jpeg, image/jpg">
      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="profile.php" class="btn">go back!</a>
   </form>
   

   <?php }; ?>

   

</div>

</div>

</body>
</html>