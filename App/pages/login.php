<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: home.php");
}
// function generateToken() {
//     return bin2hex(random_bytes(32)); // Generate a random 32-byte token (PHP 7+)
//  }

 function setRememberMeCookie($username) {
    // $token = generateToken(); // Generate a random token
    $expire = time() + (30 * 24 * 60 * 60); // 30 days expiration time
    setcookie("remember_me", $username, $expire, "/");
    
    // Store the token in the database for future reference
    // Example: mysqli_query($conn, "UPDATE users SET remember_token = '$token' WHERE username = '$username'");
 }

 if (isset($_COOKIE["remember_me"]) && !isset($_SESSION["user"])) {
    $token = $_COOKIE["remember_me"]; // Retrieve the token from the cookie
    
    // Query the database to find the user with the corresponding token
    // Example: $result = mysqli_query($conn, "SELECT * FROM users WHERE remember_token = '$token'");
    
    // If a user with the token is found, log in the user
    // Example: if (mysqli_num_rows($result) > 0) {
    //             $user = mysqli_fetch_assoc($result);
    //             $_SESSION["user"] = $user["username"];
    //         }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
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
           $_SESSION['email']=$email;
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = $email;
                    if (isset($_POST['remember_me'])) {
                        setRememberMeCookie($_SESSION["user"]);
                            }
                    header("Location: home.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Email or Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email or Password does not match</div>";
            }
           
        }
        ?>
      <form action="login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-group">
            <input type="checkbox" name="remember_me"> Remember Me
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
     <div><p>Not registered yet? <a href="registration.php">Register Here</a></p></div>
    </div>
</body>
</html>