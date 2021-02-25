<?php
session_start();

?>
<html>
<head>


    <title>Delete Record</title>
</head>
<body>

<?php


require_once 'login.php';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($connection->connect_error) die($connection->connect_error);
if (isset($_GET['del'])) {
    $_SESSION['cscn'] = $_GET['del'];
    $cs = $_SESSION['cscn'];
    $query = "DELETE FROM cscourse WHERE courseNumberAndSection='$cs'";
    $result = $connection->query($query);

    if (!$result) echo "DELETE failed: $query<br>" .
        $connection->error . "<br><br>";
    else
        header("Location:cscMain.php");

    $connection->close();
}

?>


</body>
</html>


