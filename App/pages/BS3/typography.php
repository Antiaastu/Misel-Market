<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: adminpass.php");
    exit;
}
@include 'config.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdn.emailjs.com/sdk/2.3.2/email.min.js"></script>
    <script type="text/javascript">
       (function(){
           emailjs.init("YOUR_USER_ID");
       })();
    </script>
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="black" data-image="assets/img/sidebar-5.jpg">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                </a>
            </div>
            <ul class="nav">
                <li><a href="dashboard.php"><i class="pe-7s-graph"></i><p>Dashboard</p></a></li>
                <li><a href="user.php"><i class="pe-7s-user"></i><p>User Profile</p></a></li>
                <li><a href="table.php"><i class="pe-7s-note2"></i><p>Table List</p></a></li>
                <li><a href="icons.php"><i class="pe-7s-science"></i><p>Icons</p></a></li>
                <li class="active"><a href="maps.php"><i class="pe-7s-map-marker"></i><p>Wait List</p></a></li>
                <li><a href="notifications.php"><i class="pe-7s-bell"></i><p>Notifications</p></a></li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Maps</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-dashboard"></i><p class="hidden-lg hidden-md">Dashboard</p></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i><b class="caret hidden-sm hidden-xs"></b><span class="notification hidden-sm hidden-xs">5</span><p class="hidden-lg hidden-md">5 Notifications<b class="caret"></b></p></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                            </ul>
                        </li>
                        <li><a href=""><i class="fa fa-search"></i><p class="hidden-lg hidden-md">Search</p></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href=""><p>Account</p></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><p>Dropdown<b class="caret"></b></p></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                        <?php if (isset($_SESSION["admin"])): ?>
                            <li><a href='adminout.php'><p>Log out</p></a></li>
                        <?php endif; ?>  
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Striped Table with Hover</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                            <?php
                                $select = mysqli_query($conn, "SELECT * FROM wait");
                                if(isset($_GET['add'])){
                                    $id = $_GET['add'];
                                    $get = mysqli_query($conn, "SELECT name, email FROM wait WHERE id='$id'");
                                    if (mysqli_num_rows($get) > 0) {
                                        while ($row = mysqli_fetch_assoc($get)) {
                                            $name = $row['name'];
                                            $email = $row['email'];;
                                            $sql_insert = "INSERT INTO community (name, email) VALUES ('$name', '$email')";
                                            if (mysqli_query($conn, $sql_insert)) {
                                                echo "<script>sendEmail('$email', '$name');</script>";
                                            } else {
                                                echo "Error inserting record: " . mysqli_error($conn);
                                            }
                                        }
                                    } else {
                                        echo "No records found in wait_table";
                                    }
                                    mysqli_query($conn, "DELETE FROM wait WHERE id = $id");
                                    echo "<script>window.location.href = 'maps.php';</script>";
                                }
                                if(isset($_GET['delete'])){
                                    $id = $_GET['delete'];
                                    mysqli_query($conn, "DELETE FROM wait WHERE id = $id");
                                    echo "<script>window.location.href = 'maps.php';</script>";
                                }     
                            ?>
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>National Id</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    if(mysqli_num_rows($select) > 0){
                                        while($row = mysqli_fetch_assoc($select)){ ?>
                                            <tr>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><img src="../uploaded_image/<?php echo $row['image']; ?>" height="100" alt=""></td>
                                                <td><?php echo $row['message']; ?></td>
                                                <td>
                                                    <a href="maps.php?add=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> accept</a>
                                                    <a href="maps.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> decline </a>
                                                </td>
                                            </tr>
                                        <?php } 
                                    } else { ?>
                                        <td colspan="5" style="text-align:center;"><?php echo "no recorded data"; ?></td>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/chartist.min.js"></script>
    <script src="assets/js/bootstrap-notify.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
    <script src="assets/js/demo.js"></script>

    <script type="text/javascript">
        function sendEmail(email, name) {
            emailjs.send("YOUR_SERVICE_ID", "YOUR_TEMPLATE_ID", {
                to_name: name,
                to_email: email,
                from_name: "Your Admin Name",
                message: "You have been accepted into the community!"
            })
            .then(function(response) {
                console.log("SUCCESS!", response.status, response.text);
            }, function(error) {
                console.log("FAILED...", error);
            });
        }
    </script>
</body>
</html>
