<?php
session_start();
session_destroy();
header("Location: adminpass.php");
?>