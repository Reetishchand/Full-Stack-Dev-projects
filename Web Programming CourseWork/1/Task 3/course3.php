<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  
<link rel="stylesheet" type="text/css" href="course3.css">
</head>  
<body>
<?php //course3.php
  require_once 'login.php'; /*connecting database*/
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error); ?>
    <nav class="navbar navbar-expand-md navbar-dark bg-success">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
               
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#column2">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://cs.utdallas.edu/">Department</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://cs.utdallas.edu/contact/">Contact</a>
                    </li>
                </ul>
                  
                <input type="text" class="search" placeholder="Search.." name="search">
                    <button type="submit">Go</button>
    
            </div>
        </nav>
    
 <div class="insert">
 	<form action="insert.php" method="post"><pre>
    <button><a href='insert.php' class="button1">Add a New Course</a></button>
  </pre></form>
 </div>

     



    
    
<div class="column2">

<?php
  $query  = "SELECT * FROM courses";
  $result = $connection->query($query);
  if (!$result) die($connection->error);
  $rows = $result->num_rows;
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);
	
  echo '<br> Course Number:   <a href='.$row['course_address']. ' <style=a:hover{display="block"} >' . $row['course_id']    .'</a>';
  echo '<br> Course Title: '     . $row['course_title']     . '<br><br>';
  }
  $result->close();
  $connection->close();
?>
    </div>
<div>
        <footer style="   color: blue; text-align: center;">
            <p class="foot"><a href="https://utdallas.edu/"> The University of Texas at Dallas  &copy</p>
          </footer>
        </div>
        <script src="search.js" ></script>
        </body>
    
</html>
