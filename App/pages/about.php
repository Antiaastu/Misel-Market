<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/ionicons/css/ionicons.min.css">
    <link rel="icon" href="../../Resources/images/logo.png" type="image/png" />
    <title>ምስል Market</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../Resources/css/about.css">
    <link rel="stylesheet" href="../../Resources/css/footer.css">
    <!-- <link rel="stylesheet" href="../../Resources/css/home.css"> -->
    <link rel="stylesheet" href="../../Resources/css/contact.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    
    <script>
        function toggleNavbar() {
         document.getElementById("navbar").classList.toggle("open");
}
    </script>

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
                     if(!isset($_SESSION["user"])){
             echo "<li><a href='login.php'><i class='fa-regular fa-user'></i>Login</a></li>";
              
                     }
                ?>
              <li class="get"><a href="registration.php">Get started</a></li>
          </ul>
         </div>
        </nav>
  </header>
    
    <main>
        <div class="grid-container">
            <div class="grid-item">
                <h2>About Us</h2>
                <img src="../../Resources/images/logo.png" alt="About Us">
                <p>
                    Welcome to MSL Market, where artistry meets innovation. 
                    Our story began with a collective passion for art and a vision to empower talented artists 
                    specializing in the intricate craft of creating masterpieces. As creators ourselves, 
                    we recognized the challenges artists face in showcasing their work and reaching a wider audience. 
                    Driven by the desire to bridge this gap, MSL Market emerged as a dedicated platform designed by artists,
                     for artists. Our journey is rooted in the belief that every stroke of creativity holds immense value, 
                     each artwork a story waiting to be told. We envisioned a space that not only exhibits exceptional 
                     art but also nurtures a supportive community, fostering connections between creators 
                     and art enthusiasts in Ethiopia. MSL Market is more than just a website; it's a celebration of 
                     creativity and craftsmanship. Here, you'll find a diverse array of stunning artworks, 
                     from breathtaking paintings to intricate sculptures, each piece a testament to the artists' 
                     dedication and skill. We strive to empower artists, providing them with a local platform to showcase 
                     their talent, sell their artwork, and connect with a passionate audience within Ethiopia.

                </p>
            </div><br>
            <div class="video">
                <video src="../../Resources/videos/video1.mp4" controls></video>
            </div>
            <div class="grid-item">
                <h2> Our Mission</h2>
                <img src="../../Resources/images/paint2.jpg" alt="Our Mission">
                <p>
                    Our mission is to create an immersive experience where art aficionados can explore, appreciate,
                     and collect remarkable artworks while directly supporting the artists behind them in Ethiopia. 
                     We aspire to be a catalyst for positive change, advocating for artists' recognition and fair 
                     compensation for their remarkable creations. By offering a seamless platform for artists to exhibit 
                     and sell their artworks, we aim to support their livelihoods and encourage the world to invest in 
                     the beauty of visual art from Ethiopia. Join us on this artistic journey as we celebrate the beauty 
                     of visual storytelling through the captivating world of artworks.
                </p>
            </div><br>
            <div class="grid-item">
                <h2>Our Services</h2>
                <img src="../../Resources/images/paint1.jpg" alt="Our Service">
                <p>
                    At MSL Market, we offer a range of services tailored to cater to both artists and 
                    art enthusiasts in Ethiopia. For artists, our platform provides a comprehensive space 
                    to showcase their artworks to a local audience, facilitating sales and exposure. 
                    We prioritize artists' visibility by featuring their portfolios prominently and offering
                     tools for easy management and promotion of their artworks. For art enthusiasts, 
                     we provide a curated gallery experience where you can explore a diverse collection of 
                     stunning artworks from Ethiopian creators. Our user-friendly interface allows for effortless 
                     browsing and interaction, enabling enthusiasts to discover new artists, favorite artworks, 
                     and even make secure purchases directly from the platform. Additionally, we foster a supportive 
                     community through forums and networking opportunities, allowing artists and enthusiasts alike to 
                     engage, share insights, and build meaningful connections within Ethiopia. Whether you're an artist looking to expand your reach or an art lover seeking inspiration, MSL Market is your destination to experience the beauty and richness of Ethiopian artworks.
                </p>
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
                           echo "<a href='logout.php' class='btn btn-warning'>Logout</a>";
                            }
            ?>   
            
            </div>
  </footer>

    <script src="../../Resources/js/about.js"></script>
</body>
</html>