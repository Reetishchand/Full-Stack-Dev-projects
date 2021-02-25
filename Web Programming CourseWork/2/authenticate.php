<?php
// Start the session
session_start();
?>
<html>
<style>
*{
font-family:verdana;
}
</style>
<head>
  <title>Coursebook Login</title>
  <link rel="stylesheet" href="signup.css">
</head>

<body>

<h2 class="loginHeading">Enter Credentials</h2>

<form name="myForm" method="post" action="">
	<div>
    <thead> CourseBook </thead>
		<table align="center" class="tblLogin" height=300px>
			<tr class="tableheader">
			<th></b></th>
			</tr>
			<tr class="tablerow"> <td> Username </td>
			<td>
			<input type="text" name="userName" placeholder="User Name" class="login-input"></td>
			</tr>
			<tr class="tablerow"><td> Password </td>
			<td>
			<input type="password" name="password" placeholder="Password" class="login-input"></td>
			</tr>
			<tr class="tableheader">
			<td align="center" colspan="2"><input type="submit" name="submit" value="Login" class="btnSubmit"></td>
      </tr>
      <tr class="tablerow">
			<td>
			Not an existing user? <a href="signup.php">Signup</a>	
			</td>
			</tr>
    </table>
</div>
</form>

<?php
  require_once 'login.php';
  
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);

  if($_POST && isset($_POST['submit'])) {

    $query = "SELECT * FROM users WHERE Username='" . $_POST["userName"] . "' and password = '". $_POST["password"]."'";

    $result = $connection->query($query);
    
    $count  = mysqli_num_rows($result);
    
    if (!$result) die($connection->error);
    
    if ($count != 0) {
      $row = $result->fetch_array(MYSQLI_NUM);
      
      if ($_POST["password"] == $row[2]) { 
        $_SESSION["UserId"] = $row[1];
        echo "alert(".$_SESSION["UserId"].")";
date_default_timezone_set('America/Chicago');
		$Login_Time = date("Y-m-d h:i:sa");

 $userid = $_SESSION["UserId"];
		$query1    = "INSERT INTO userlog (`UserId`, `Login_Time`) VALUES" .
      "('$userid','$Login_Time')";
    $result   = $connection->query($query1);

  	if (!$result) {echo "INSERT failed: $query1<br>" .
	$connection->error . "<br><br>";}
        header("Location:myhomepage.php");
      } 
      else { 
        echo("Invalid username/password combination");
      }
    }
    
    else {
      echo("Invalid Credentials. Check and try again!");
    }
  }

  $connection->close();
?>

<footer class="footerClass"><sup>&copy</sup> <b>The University Of Texas at Dallas</b></footer>

</body>

</html>