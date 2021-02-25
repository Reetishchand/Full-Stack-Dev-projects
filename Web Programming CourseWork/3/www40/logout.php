<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php");
echo '<html><a href="index.php">Click here to login </a></html>';
?>


