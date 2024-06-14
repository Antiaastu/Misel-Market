<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="shortcut icon" type="image/png" href="../../Resources/images/logo.png">
    <link rel="stylesheet" href="../../Resources/css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
   
    <!-- <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
    </script>
   <script type="text/javascript">
        (function(){
            emailjs.init({
                publicKey: "o4OavoYEErKhyzBZu",
            });
        })();
        
        function sendMail() {
            let params = {
                toname: document.getElementById("name").value,
                toemail: document.getElementById("email").value,
            };

            emailjs.send("service_1qb9hm9", "template_w96nl8e", params)
            .then(function(response) {
                alert("Email Sent Successfully");
                document.querySelector("form").submit(); // Submit the form
            })
            .catch(function(error) {
                alert("Email Sending Failed");
            });

        // Prevent the form from submitting immediately
        return false;
        }
    </script> -->
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
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];

           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           $sql1 = "SELECT * FROM community WHERE email = '$email'";
           $res = mysqli_query($conn, $sql1);
           $rowCount1 = mysqli_num_rows($res);
           if ($rowCount1<1) {
            array_push($errors,"You are not a community member!\n if you want to join us\n <a href='contact.php'>Contact us</a>");
           }
           
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
                header("Location: login.php");
                
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <form action="registration.php" method="post" >
            <div class="form-group">
                <input type="text" id="name" class="form-control" name="fullname" placeholder="Full Name:">
            </div>
            <div class="form-group">
                <input type="email" id="email" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <button type="submit" class="btn btn-primary" name="submit">Register</button>
            </div>
        </form>
        <div>
        <div><p>Already Registered <a href="login.php">Login Here</a></p></div>
      </div>
    </div>
    <!-- <script>
        function sendMail(){

            let  params = {
                name:document.getElementById("name").value,
                email:document.getElementById("email").value,
            };

            // var serviceID = "service_1qb9hm9";
            // var templateID ="template_w96nl8e";

            emailjs.send("service_1qb9hm9", "template_w96nl8e", params).then(alert("Email Sent Successfully"));
        }
    </script> -->

</body>
</html>