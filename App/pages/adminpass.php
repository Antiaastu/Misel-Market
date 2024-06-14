<?php
session_start();
if (isset($_SESSION["admin"])) {
   header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Form</title>
    <link rel="shortcut icon" type="image/png" href="../../Resources/images/logo.png">
    <link rel="stylesheet" href="../../Resources/css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header id="header" class="header">
          <div class="logo">
             <a href="home.php"><img src="../../Resources/images/logo.png" alt="logo"></a>
             <!-- <div class="logo-text">ምስል market</div> -->
          </div>
          
    </header>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
           if($password=="12345678" && $email="ante@gmail.com"){
            session_start();
            $_SESSION["admin"]="yes";
            header("Location: admin.php");
            die();
           }
           else{
            echo "<div class='alert alert-danger'>Password or email does not match</div>";
           }
            //$_SESSION['email']=$email;
            // require_once "database.php";
            // $sql = "SELECT * FROM users WHERE email = '$email'";
            // $result = mysqli_query($conn, $sql);
            // $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            // if ($user) {
            //     if (password_verify($password, $user["password"])) {
            //         session_start();
            //         $_SESSION[""] = $email;
            //         header("Location: admin.php");
            //         die();
            //     }else{
            //         echo "<div class='alert alert-danger'>Password does not match</div>";
            //     }
            // }else{
            //     echo "<div class='alert alert-danger'>Email does not match</div>";
            // }

        }
        ?>
      <form action="adminpass.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
    
    </div>
</body>
</html>