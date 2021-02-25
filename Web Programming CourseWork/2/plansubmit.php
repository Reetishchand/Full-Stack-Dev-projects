<?php
session_start();
if(!isset($_SESSION["UserId"])) {
    
header("Location:authenticate.php");
}
if($_SESSION["UserId"])
	{
	
date_default_timezone_set('America/Chicago');
 require_once 'login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);
  
$sql = "DELETE FROM degreeplan1 WHERE case_name= '".$_SESSION["case_name"]."'";
if($connection->query($sql) === True)

  
    $core5 = $_POST['core5'];
    $elec1 = $_POST['elec1'];
    $elec2 = $_POST['elec2'];
	$elec3 = $_POST['elec3'];
	$elec4 = $_POST['elec4'];
	$elec5 = $_POST['elec5'];
	$elec6 = $_POST['elec6'];
	
	$prereq1 = $_POST['prereq1'];

	$prereq2 = $_POST['prereq2'];
	$prereq3 = $_POST['prereq3'];
	$prereq4 = $_POST['prereq4'];
	$prereq5 = $_POST['prereq5'];
	$prereq6 = $_POST['prereq6'];
	$semadmit = $_POST['semadmit'];
	
    
 
$core1 = 'Natural Language Processing CS6320';
$core2 = ' Design and Analysis of Computer Algorithms CS6363';
$core3 = 'Artificial Intelligence CS6364';
$core4 = 'Machine Learning CS6375';
 $Login_Time = date("Y-m-d h:i:sa");
 $case_name = $_SESSION["UserId"].' '.$Login_Time;
 $userid = $_SESSION["UserId"];
 $query1    = "INSERT INTO degreeplan1  (`UserId`, `case_name`, `TimeStamp`, `semadmit`, `core1`, `core2`, `core3`, `core4`, `core5`, `elec1`, `elec2`, `elec3`, `elec4`, `elec5`, `elec6`, `prereq1`, `prereq2`, `prereq3`, `prereq4`, `prereq5`, `prereq6`) VALUES " .
      "('$userid','$case_name','$Login_Time','$semadmit','$core1', '$core2', '$core3','$core4','$core5','$elec1', '$elec2', '$elec3', '$elec4', '$elec5', '$elec6','$prereq1','$prereq2','$prereq3','$prereq4','$prereq5','$prereq6')";
    $result   = $connection->query($query1);

  	if (!$result) {echo "INSERT failed: $query1<br>" .
	$connection->error . "<br><br>";}
   
	if($result){
    
	header("Location:myhomepage.php");}
 

 $connection->close();
	}
?>	