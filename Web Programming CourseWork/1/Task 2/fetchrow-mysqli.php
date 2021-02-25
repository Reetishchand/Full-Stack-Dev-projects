<?php //fetchrow-mysqli.php
  require_once 'login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);

  $query  = "SELECT * FROM course1";
  $result = $connection->query($query);

  if (!$result) die($connection->error);

  $rows = $result->num_rows;

  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

    echo 'Course ID: '   . $row['course_id']   . '<br>';
    echo 'Course Number: '    . $row['course_number']    . '<br>';
    echo 'Course Address: ' . $row['course_address'] . '<br>';
    echo 'Course Title: '     . $row['course_title']     . '<br>';
    echo 'Course Hours: '   . $row['course_hours']   . '<br>';
    echo 'Course Description: '    . $row['course_description']    . '<br>';
    echo 'Course Prerequisite link: ' . $row['course_prerequisite_link'] . '<br>';
    echo 'Course Prerequisite: '     . $row['course_prerequisite']     . '<br>';
    echo 'Course Corequisite link: '   . $row['course_corequisite_link']   . '<br>';
    echo 'Course Corequisite: '    . $row['course_corequisite']    . '<br>';
    echo 'Course TimeCreated: ' . $row['course_TimeCreated'] . '<br>';
    echo 'Course TimeUpdated: '     . $row['course_TimeUpdated']     . '<br><br>';
  }

  $result->close();
  $connection->close();
?>
