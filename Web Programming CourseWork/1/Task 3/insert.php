<?php // mysqlitest.php
  require_once 'login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);
/* This code deletes the record from courses Table */
  if (isset($_POST['delete']) && isset($_POST['CourseID']))
  {
    $CourseID   = get_post($connection, 'CourseID');
    $query  = "DELETE FROM courses WHERE course_id='$CourseID'"; 
    $result = $connection->query($query);

  	if (!$result) echo "DELETE failed: $query<br>" .
      $connection->error . "<br><br>";
  }
/* Delete code ended */
/*This code inserts courses record in the table */
  if (isset($_POST['CourseID'])   &&
      isset($_POST['CourseNumber'])   &&
      isset($_POST['CourseAddress'])    &&
      isset($_POST['CourseTitle']) &&
      isset($_POST['CourseHours'])     &&
      isset($_POST['CourseDescription']) &&
      isset($_POST['CoursePrerequisiteLink']) &&
      isset($_POST['CoursePrerequisite']) &&
      isset($_POST['CourseCorequisiteLink']) &&
      isset($_POST['CourseCorequisite']) &&
     isset($_POST['CourseTimeCreated']) &&
     isset($_POST['CourseTimeUpdated']) )
  {
    $CourseID = get_post($connection, 'CourseID');
    $CourseNumber = get_post($connection, 'CourseNumber');  
    $CourseAddress = get_post($connection, 'CourseAddress');
    $CourseTitle = get_post($connection, 'CourseTitle');
    $CourseHours = get_post($connection, 'CourseHours');
    $CourseDescription = get_post($connection, 'CourseDescription');
    $CoursePrerequisiteLink = get_post($connection, 'CoursePrerequisiteLink');
    $CoursePrerequisite = get_post($connection, 'CoursePrerequisite');
    $CourseCorequisiteLink = get_post($connection, 'CourseCorequisiteLink');
    $CourseCorequisite = get_post($connection, 'CourseCorequisite');
    $CourseTimeCreated = get_post($connection, 'CourseTimeCreated');
    $CourseTimeUpdated = get_post($connection, 'CourseTimeUpdated');

    $query    = "INSERT INTO courses VALUES" .
      "('$CourseID', '$CourseNumber', '$CourseAddress', '$CourseTitle', '$CourseHours', '$CourseDescription', '$CoursePrerequisiteLink','$CoursePrerequisite','$CourseCorequisiteLink','$CourseCorequisite','$CourseTimeCreated','$CourseTimeUpdated')";
    $result   = $connection->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $connection->error . "<br><br>";
  }
/*insert code ended */
  echo <<<_END
  <form action="course2.php" method="post"><pre>
    CourseID <input type="text" name="CourseID">
    CourseNumber <input type="text" name="CourseNumber">
    CourseAddress <input type="text" name="CourseAddress">
    CourseTitle <input type="text" name="CourseTitle">
    CourseHours <input type="text" name="CourseHours">
     CourseDescription <input type="text" name=" CourseDescription">
    CoursePrerequisiteLink <input type="text" name="CoursePrerequisiteLink">
    CoursePrerequisite <input type="text" name="CoursePrerequisite">
    CourseCorequisiteLink <input type="text" name="CourseCorequisiteLink">
    CourseCorequisite <input type="text" name="CourseCorequisite">
    CourseTimeCreated <input type="datetime-local" name="CourseTimeCreated">
    CourseTimeUpdated <input type="datetime-local" name="CourseTimeUpdated">

    <input type="submit" value="ADD RECORD"></br>
    <button onclick="addTestCase1()">addTestcase</button></br>
  </pre></form>

_END;
/* this code displays student record from the table */
  $query  = "SELECT * FROM courses";
  $result = $connection->query($query);

  if (!$result) die ("Database access failed: " . $connection->error);

  $rows = $result->num_rows;
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
  <pre>
    CourseID: $row[0]
    CourseNumber: $row[1]
    CourseAddress: $row[2]
    CourseTitle: $row[3]
    CourseHours: $row[4]
    CourseDescription: $row[5]
    CoursePrerequisiteLink: $row[6]
    CoursePrerequisite: $row[7]
    CourseCorequisiteLink: $row[8]
    CourseCorequisite: $row[9]
    CourseTimeCreated: $row[10]
    CourseTimeUpdated: $row[11]
  <form action="course2.php" method="post">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="CourseID" value="$row[0]">
  <button><a href='edit.php?edit=$row[0]'>UPDATE Record</a></button></br>
  <button onclick="deleteTestCase1()">deleteTestcase</button></br>
  <input type="submit" value="DELETE RECORD"></form>
  </pre>

_END;
  }
  
  $result->close();
  $connection->close();
  
  function get_post($connection, $var)
  {
    return $connection->real_escape_string($_POST[$var]);
  }
?>

<script>

function addTestCase1() {
<?php
if (isset($_POST['CourseID'])   &&
    isset($_POST['CourseNumber'])    &&
      isset($_POST['CourseAddress'])    &&
      isset($_POST['CourseTitle']) &&
      isset($_POST['CourseHours'])     &&
      isset($_POST['CourseDescription']) &&
      isset($_POST['CoursePrerequisiteLink']) &&
      isset($_POST['CoursePrerequisite']) &&
      isset($_POST['CourseCorequisiteLink']) &&
      isset($_POST['CourseCorequisite']) &&
      isset($_POST['CourseTimeCreated']) &&
      isset($_POST['CourseTimeUpdated']) )
{
$CourseID = $_POST['CourseID'];
$CourseNumber = $_POST['CourseNumber'];    
$CourseAddress = $_POST['CourseAddress'];
$CourseHours = $_POST['CourseHours'];
$CourseTitle = $_POST['CourseTitle'];
$CourseDescription = $_POST['CourseDescription'];
$CoursePrerequisiteLink = $_POST['CoursePrerequisiteLink'];
$CoursePrerequisite = $_POST['CoursePrerequisite'];
$CourseCorequisiteLink = $_POST['CourseCorequisiteLink'];
$CourseCorequisite = $_POST['CourseCorequisite'];
$CourseTimeCreated = $_POST['CourseTimeCreated'];
$CourseTimeUpdated = $_POST['CourseTimeUpdated'];    
$sql = "INSERT INTO courses
VALUES ('$CourseID', '$CourseNumber', '$CourseAddress', '$CourseTitle', '$CourseHours','$CourseDescription','$CoursePrerequisiteLink','$CoursePrerequisite','$CourseCorequisiteLink','$CourseCorequisite', '$CourseTimeCreated', '$CourseTimeUpdated')";
if (mysqli_query($connection, $sql)) {
    echo "New record created succeddfully !";
} else {
    echo "Error : " . $sql . "<br>" . mysqli_error($connection);
}
}
mysqli_close($connection);
?>
}



</script>
