<?php
  require_once "login.php";

$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
 
  if (isset($_POST['query'])) {
     
    $query = "SELECT * FROM course1 WHERE course_id LIKE '%{$_POST['query']}%' LIMIT 100";
    $result = mysqli_query($connection, $query);
 
  if ($result) {
     while ($row = mysqli_fetch_array($result)) {
     	$cid=$row['course_id'];
     	$title=$row['course_title'];
      $address=$row['course_address'];
      $search="<a href=".$address.">$cid $title</a>";
     	echo "<a href=\"myhomepage.php?cid=$cid\">".$search."</a><br>";
    }
  } else {
    echo "<p style='color:red'>Course not found...</p>";
  }
 
}
?>