<?php
session_start();
session_destroy(); 
unset($_SESSION["success"]);



header("Location: ../index.php");
exit();
?>
