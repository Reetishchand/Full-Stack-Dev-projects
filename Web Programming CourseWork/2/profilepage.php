<?php
session_start();
?>
<html>
<title> Profile Page </title>
<style>
table
{
float:center;
border-style:solid;
border-width:1px;
border-color:black;
width: 500px;
height: 500px;
text-align: center;
}
</style>

<h1  align='center'> Profile Page</h1>
<body bgcolor="lightblue">
<?php
$user = $_SESSION["UserId"];
 require_once 'login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
  if ($connection->connect_error) die($connection->connect_error);
$sql = "Select * FROM users  WHERE Username = '$user'; ";
$query  = mysqli_query($connection, $sql);
echo "<table border='1' align='center'>";
while($row = mysqli_fetch_assoc($query)) {
    
      echo '<tr> <td><b> Name </b></td><td> '.$row['Username'].'</td></tr>';
      echo '<tr> <td><b> Semester </b></td><td>'.$row['semester'].'</td></tr>';
      echo '<tr>  <td><b>Track </b></td><td>'.$row['track'].'</td></tr>';
      echo '<tr><td>   <b>Email </b></td><td> '.$row['EmailID'].'</td></tr>';
    
} 

$connection->close();
?>
</body>
</html>