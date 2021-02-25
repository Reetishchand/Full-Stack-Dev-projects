<?php 
session_start();
session_unset();
session_destroy();
header("Location: authenticate.php");
echo '<html><a href="authenticate.php">Click here to login </a></html>';
?>


