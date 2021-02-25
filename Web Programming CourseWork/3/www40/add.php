<?php
session_start();
?>
<html>
<head>

    <title>Add Course</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1> Enter the New Course Details</h1>
<?php
if (!isset($_SESSION["UserId"])) {

    header("Location:index.php");
}
if ($_SESSION["UserId"]) {
    ?>

    <?php
    require_once 'login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

    if ($conn->connect_error) die($conn->connect_error); ?>
    <?php
    $dbQuery = "SELECT * FROM users";
    $output = $conn->query($dbQuery);

    if (!$output) die($conn->error);

    $rows1 = $output->num_rows;

    for ($j = 0; $j < $rows1; ++$j) {
        $output->data_seek($j);
        $row1 = $output->fetch_array(MYSQLI_ASSOC);
        if ($row1['UserId'] == $_SESSION["UserId"])
            //  echo $row1['Username'];  $_SESSION["UserId"];
            $_SESSION["Username"] = $row1['Username'];


    }

    $output->close();

    ?>


    <?php
    require_once 'login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

    if ($conn->connect_error) die($conn->connect_error);


    if (isset($_POST['termstatus']) &&
        isset($_POST['cscn']) &&
        isset($_POST['craddress']) &&
        isset($_POST['ct']) &&
        isset($_POST['instructor']) &&
        isset($_POST['instructoraddress']) &&
        isset($_POST['schedule'])) {
        $termstatus = $_POST['termstatus'];
        $cscn = $_POST['cscn'];
        $craddress = $_POST['craddress'];
        $ct = $_POST['ct'];
        $instructor = $_POST['instructor'];
        $instructoraddress = $_POST['instructoraddress'];
        $schedule = $_POST['schedule'];
        date_default_timezone_set('America/Chicago');
        $curTime = date("Y-m-d h:i:sa");
        $sql = "INSERT INTO cscourse VALUES ('$termstatus', '$cscn', '$craddress', '$ct', '$instructor', '$instructoraddress','$schedule','$curTime','$curTime')";
        $result = $conn->query($sql);

        if (!$result) echo "INSERT failed: $sql<br>" .
            $conn->error . "<br><br>";
        else header("Location:cscMain.php");
    }

    ?>


    <form action="add.php" method="post"><pre>


          <table class="table table-hover" ; cellspacing="5px" cellpadding="5%">
     
	 
	 <tr>
    <td>Course Status<br> <br> <input type="text" name="termstatus" required></td>
    <td>Class Numer & Section<br> <br> <input type="text" name="cscn" required></td>
	<td>Course Webpage<br> <br> <input type="text" name="craddress" required></td>
    <td>Course Title<br> <br> <input type="text" name="ct" required> </td>
    <td>Lecturer<br> <br> <input type="text" name="instructor" required></td>
	<td>Lecturer Webpage<br> <br> <input type="text" name="instructoraddress" required></td>
    <td>Timings<br> <br>    <input type="text" name="schedule" required></td>

     </tr>
     
   
	
  
  
  </table>
  <input type="submit" style="margin-center:800px" value="ADD RECORD">
    </form>
    </div>

    <?php


    function get_post($con, $var)
    {
        return $con->real_escape_string($_POST[$var]);
    }

    $conn->close();
}
?>

</body>
</html>