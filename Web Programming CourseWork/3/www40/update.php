<?php
session_start();
?>
    <html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Update Course</title>
    </head>
<body>
<?php
if (!isset($_SESSION["UserId"])) {

    header("Location:index.php");
}
if ($_SESSION["UserId"]) {
    ?>
    <?php
    require_once 'login.php';
    $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

    if ($connection->connect_error) die($connection->connect_error); ?>
    <?php
    date_default_timezone_set('America/Chicago');
    $curTime = date("Y-m-d h:i:sa");
    $dbquery = "SELECT * FROM users";
    $output = $connection->query($dbquery);

    if (!$output) die($connection->error);

    $elements = $output->num_rows;

    for ($j = 0; $j < $elements; ++$j) {
        $output->data_seek($j);
        $ele = $output->fetch_array(MYSQLI_ASSOC);
        if ($ele['UserId'] == $_SESSION["UserId"])
            //  echo $row1['Username'];  $_SESSION["UserId"];
            $_SESSION["Username"] = $ele['Username'];


    }

    $output->close();

    ?>


    <?php
    require_once 'login.php';
    $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

    if ($connection->connect_error) die($connection->connect_error);


    if (isset($_POST['termstatus']) &&
        isset($_POST['cscn']) &&
        isset($_POST['ct']) &&
        isset($_POST['instructor']) &&
        isset($_POST['schedule'])) {
        $termstatus = $_POST['termstatus'];
        $cscn = $_POST['cscn'];
        $ct = $_POST['ct'];
        $instructor = $_POST['instructor'];
        $schedule = $_POST['schedule'];
        $sql = "UPDATE cscourse SET lastUpdated='" . $curTime . "', courseStatus='" . $termstatus . "',courseTitle='" . $ct . "',lecturer='" . $instructor . "',Timings='" . $schedule . "' WHERE courseNumberAndSection='" . $cscn . "'";

        $result = $connection->query($sql);

        if (!$result) echo "Update failed: $sql<br>" .
            $connection->error . "<br><br>";
        else header("Location:cscMain.php");
    }

    ?>


    <h2>Enter Details To Update a Course</h2>
    </div>
    </div>

    <form action="update.php" method="post"><pre>

          <table class="table table-hover" ; cellspacing="6px" cellpadding="6%">
     <thead>
	 </thead>
	 <tbody>
	 <tr>
   <td> Class Number & Section <br> <br><input type="text" name="cscn" required></td>
   <td> Course Status <br> <br> <input type="text" name="termstatus" required></td>
   <td>  Course Title <br> <br><input type="text" name="ct" required></td>
   <td> Lecturer <br> <br> <input type="text" name="instructor" required></td>
   <td> Timings<br> <br> <input type="text" name="schedule" required></td>
     </tr>
      
    </tbody>
              </div>
              </div>
    
  </table>
  <input type="submit" style="margin-center:700px" value="Update Course">
    </form>
    </div>

    <?php


    function get_post($connection, $var)
    {
        return $connection->real_escape_string($_POST[$var]);
    }

    $connection->close();
}
?>