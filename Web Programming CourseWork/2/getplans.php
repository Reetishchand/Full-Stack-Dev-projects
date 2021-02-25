<?php
session_start();

?>
<html>
<head> 
<title>Display</title>
</head>
  <link rel="stylesheet" href="myhomepage.css">

<body>

<?php


require_once 'login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error); 
  if(isset($_GET['id']))
  {
  $_SESSION['case_name'] = $_GET['id'];
 
 $query  = "SELECT * FROM degreeplan1 where case_name='{$_SESSION['case_name']}'";

 $result = $connection->query($query);

  if (!$result) {
  die($connection->error);}
  
$row = $result->fetch_array(MYSQLI_ASSOC);
  $result->close();
 $connection->close();
  }

  ?>
  
  
  
  
  
			<h2>University of Texas at Dallas</h2>
			<h3>MASTERS IN COMPUTER SCIENCE</h3>
			<h3> DEGREE PLAN </h3>
		
<form name="degplan" action="plansubmit.php" method = "post" >
    
      
      Name of Student  <?php  echo '<b>' .$_SESSION["UserId"]. '</b>';?>
     Semester Admitted<input type="text" name="semadmit" id ="semadmit" value="<?php echo $row['semadmit']?>" required>
    Anticipated Graduation <input type="text" name="antgrad" value="<?php echo $row['gradsem']?>">
     
       
    

   
    
          <table  >

     <thead>
  <tr>
    <th >Course Title</th>
    <th>Course Number</th>
    <th>UTD Semester</th>
    <th>Transfer</th>
     <th>Grade</th>
  </tr>
  <tr>
    <th colspan="5">CORE COURSES    (15 Credit Hours)       3.19 Grade Point Average Required</th>
  </tr>
   </thead>
   <tbody>
   <tr>
   <td>Natural Language Processing</td>
   <td> CS 6320</td>
   <td><input type="text" name="core1sem" value="<?php echo $row['core1sem']?>"></td>
   <td><input type="text" name="row1transfer"></td>
   <td><input type="text" name="row1grade" value="<?php echo $row['core1grade']?>"></td>
   </tr>
   <tr>
   <td> Design and Analysis of Computer Algorithms</td>
   <td> CS 6363</td>
   <td><input type="text" name="row2sem" value="<?php echo $row['core2sem']?>"></td>
   <td><input type="text" name="row2transfer"></td>
   <td><input type="text" name="row2grade" value="<?php echo $row['core2grade']?>"></td>
   </tr>
   <tr>
   <td> Artificial Intelligence</td>
   <td> CS 6364</td>
   <td><input type="text" name="row3sem" value="<?php echo $row['core3sem']?>"></td>
   <td><input type="text" name="row3transfer"></td>
   <td><input type="text" name="row3grade" value="<?php echo $row['core3grade']?>"></td>
   </tr>
   <tr>
   <td> Machine Learning</td>
   <td> CS 6375</td>
   <td><input type="text" name="row4sem" value="<?php echo $row['core4sem']?>"></td>
   <td><input type="text" name="row4transfer"></td>
   <td><input type="text" name="row4grade" value="<?php echo $row['core4grade']?>"></td>
   </tr>  
   </tbody>
  </table>
    	
	
    	 <table >

     <thead>
     <tr>
     <th></th>
     <th>Course Title</th>
    <th>Course Number</th>
    <th>UTD Semester</th>
    <th>Transfer</th>
    <th>Grade</th>
    </tr>
    <tr>
    <th  colspan="5"> ONE OF THE FOLLOWING TWO CORE COURSES</th></tr>
    </thead>
    <tbody>
    	<tr>
  <td><input type="radio" id = "DbD" name="core5" value="DBDesignCS6360" <?php if($row['core5']=="DBDesignCS6360") echo "checked"; ?> required onchange="DBD();"></td>
   <td>Database Design </td>
   <td> CS 6360</td>
   <td><input type="text" name="row5sem" value="<?php if($row['core5']=="DBDesignCS6360") echo $row['core5sem']; ?>"></td>
   <td><input type="text" name="row5transfer"></td>
   <td><input type="text" name="row5grade" value="<?php if($row['core5']=="DBDesignCS6360") echo $row['core5grade']; ?>"></td>
   </tr>
   <tr>
   <td><input type="radio" id = "AOS" name="core5" value="AdOSCS6378" <?php if($row['core5']=="AdOSCS6378") echo "checked"; ?> required onchange="AdOS();"></td>
   <td>Advanced Operating Systems </td>
   <td> CS 6378</td>
   <td><input type="text" name="row6sem" value="<?php if($row['core5']=="AdOSCS6378") echo $row['core5sem']; ?>"></td>
   <td><input type="text" name="row6transfer"></td>
   <td><input type="text" name="row6grade" value="<?php if($row['core5']=="AdOSCS6378") echo $row['core5grade']; ?>" ></td>
   </tr>	
	
    </tbody>
    </table>


    
    <table >
	 <thead>
     <tr>
     <th>Course Title and Course Number</th>
     <th>UTD Semester</th>
     <th>Transfer</th>
     <th>Grade</th>
     </tr>
    <tr>
    <th  colspan="4"> FIVE APPROVED 6000 LEVEL ELECTIVES        15 CREDIT HOURS         3.0 GRADE POINT AVERAGE</th></tr>
    </thead>
    <tbody>
    	<tr>
	<td><select id="ele1" name="elec1" class ="Elective" value="Choose one of the electives " style="width: 200px" required>
   
     <option value="Special Topics in Computer ScienceI CS6301">CS6301 - Special Topics in Computer ScienceI</option>
     <option value="Special Topics in Computer ScienceII CS6302">CS6302 - Special Topics in Computer ScienceII</option>
     <option value="Computer Architecture CS6304">CS6304 - Computer Architecture </option>
     <option value="Introduction to Big Data Management and Analytics CS6307">CS6307 - Introduction to Big Data Management and Analytics</option>
     <option value="Statistical Methods for Data Science CS6313">CS6313 - Statistical Methods for Data Science</option>
     <option value="Web Programming Languages CS6314">CS6314 - Web Programming Languages</option>
     <option value="Semantic Web CS6315">CS6315 - Semantic Web</option>
     <option value="Discourse Processing CS6321">CS6321 - Discourse Processing</option>
     <option value="Information Retrieval CS6322">CS6322 - Information Retrieval</option>
     <option value="Computer Animation and Gaming CS6323">CS6323 - Computer Animation and Gaming</option>
     <option value="Information Security CS6324">CS6324 - Information Security</option>
     <option value="Introduction to Bioinformatics CS6325">CS6325 - Introduction to Bioinformatics</option>
     <option value="Human Computer Interactions CS6326">CS6326 - Human Computer Interactions</option>
     <option value="Video Analytics CS6327">CS6327 - Video Analytics</option>
     <option value="Modeling and Simulation CS6328">CS6328 - Modeling and Simulation</option>
     <option value="Multimedia Systems CS6331">CS6331 - Multimedia Systems</option>
     <option value="Systems Security and Malicious Code Analysis CS6332">CS6332 - Systems Security and Malicious Code Analysis</option>
     <option value="Algorithms in Computational Biology CS6333">CS6333 - Algorithms in Computational Biology</option>
     <option value="Virtual Reality CS6334">CS6334 - Virtual Reality</option>
     <option value="Wireless Networks CS6340">CS6340 - Wireless Networks</option>   
     <option value="Cloud Computing CS6343">CS6343 - Cloud Computing</option>
     <option value="Data Representation CS6344">CS6344 - Data Representation</option>
     <option value="Statistical Methods in AI and Machine Learning CS6347">CS6347 - Statistical Methods in AI and Machine Learning</option>
     <option value="Data and Applications Security CS6349">CS6349 - Data and Applications Security</option>
     <option value="Network Security CS6350">CS6350 - Network Security</option>
     <option value="Big Data Management and Analytics CS6352">CS6352 - Big Data Management and Analytics</option>
     <option value="Performance of Computer Systems and Networks CS6353">CS6353 - Performance of Computer Systems and Networks</option>
     <option value="Software Maintenance, Evolution, and Re-Engineering CS6356">CS6356 - Software Maintenance, Evolution, and Re-Engineering</option>
     <option value="Object-Oriented Analysis and Design CS6359">CS6359 - Object-Oriented Analysis and Design</option>
     <option value="Advanced Requirements Engineering CS6361">CS6361 - Advanced Requirements Engineering</option>
     <option value="Data and Text Mining for Computational Biology CS6365">CS6365 - Data and Text Mining for Computational Biology</option>
     <option value="Computer Graphics CS6366">CS6366 - Computer Graphics</option>   
     <option value="Software Testing, Validation and Verification CS6367">CS6367 - Software Testing, Validation and Verification</option>
     <option value="Telecommunication Network Management CS6368">CS6368 - Telecommunication Network Management</option>
     <option value="Complexity of Combinatorial Algorithms CS6369">CS6369 - Complexity of Combinatorial Algorithms</option>
     <option value="Advanced Programming Languages CS6371">CS 6371 - Advanced Programming Languages</option>
     <option value="Intelligent Systems CS6373">CS6373 - Intelligent Systems</option>
     <option value="Computational Logic CS6374">CS6374 - Computational Logic</option>
     <option value="Parallel Processing CS6376">CS6376 - Parallel Processing</option>
     <option value="Introduction to Cryptography CS6377">CS6377 - Introduction to Cryptography</option>
     <option value="Biological Database Systems and Data Mining CS6379">CS6379 - Biological Database Systems and Data Mining </option>
     <option value="Distributed Computing CS6380">CS6380 - Distributed Computing </option>
     <option value="Combinatorics and Graph Algorithms CS6381">CS6381 - Combinatorics and Graph Algorithms</option>
     <option value="Theory of ComputationCS6382">CS 6382 - Theory of Computation</option>
     <option value="Computational Systems Biology CS6383">CS6383 - Computational Systems Biology</option>
     <option value="Computer Vision CS6384">CS 6384 - Computer Vision </option>
     <option value="Algorithmic Aspects of Telecommunication Networks CS6385">CS6385 - Algorithmic Aspects of Telecommunication Networks</option>
     <option value="Telecommunication Software Design CS6386">CS6386 - Telecommunication Software Design</option>
     <option value="Advanced Computer Networks CS6390">CS6390 - Advanced Computer Networks </option>
	 <option value="Optical Networks CS6391">CS6391 - Optical Networks </option>
 	 <option value="Mobile Computing Systems CS6392">CS6392 - Mobile Computing Systems</option>
 	 <option value="Advanced Algorithms in Biology CS6393">CS6393 - Advanced Algorithms in Biology</option>
 	 <option value="Speech Recognition, Synthesis, and Understanding CS6395">CS6395 - Speech Recognition, Synthesis, and Understanding</option>
 	 <option value="Real-Time Systems CS6396">CS6396 -  Real-Time Systems</option>
 	 <option value="Synthesis and Optimization of High-Performance Systems CS6397">CS6397 - Synthesis and Optimization of High-Performance Systems</option>
 	 <option value="DSP Architectures CS6398">CS6398 - DSP Architectures</option>
 	 <option value="Parallel Architectures and Systems CS6399">CS6399 - Parallel Architectures and Systems</option>  
 </select>
    </td>
    <td><input type="text" name="row7sem" value="<?php echo $row['elec1sem']?>"></td>
   <td><input type="text" name="row7transfer"></td>
   <td><input type="text" name="row7grade" value="<?php echo $row['elec1grade']?>"></td>
   </tr>
   <tr>
    <td><select id="ele2" name="elec2" class ="Elective" value="Choose one of the electives " style="width: 200px" required>
     <option value="Special Topics in Computer ScienceI CS6301">CS6301 - Special Topics in Computer ScienceI</option>
     <option value="Special Topics in Computer ScienceII CS6302">CS6302 - Special Topics in Computer ScienceII</option>
     <option value="Computer Architecture CS6304">CS6307 - Computer Architecture</option>
     <option value="Introduction to Big Data Management and Analytics CS6307">CS6307 - Introduction to Big Data Management and Analytics</option>
     <option value="Statistical Methods for Data Science CS6313">CS6313 - Statistical Methods for Data Science</option>
     <option value="Web Programming Languages CS6314">CS6314 - Web Programming Languages</option>
     <option value="Semantic Web CS6315">CS6315 - Semantic Web</option>
     <option value="Discourse Processing CS6321">CS6321 - Discourse Processing</option>
     <option value="Information Retrieval CS6322">CS6322 - Information Retrieval</option>
     <option value="Computer Animation and Gaming CS6323">CS6323 - Computer Animation and Gaming</option>
     <option value="Information Security CS6324">CS6324 - Information Security</option>
     <option value="Introduction to Bioinformatics CS6325">CS6325 - Introduction to Bioinformatics</option>
     <option value="Human Computer Interactions CS6326">CS6326 - Human Computer Interactions</option>
     <option value="Video Analytics CS6327">CS6327 - Video Analytics</option>
     <option value="Modeling and Simulation CS6328">CS6328 - Modeling and Simulation</option>
     <option value="Multimedia Systems CS6331">CS6331 - Multimedia Systems</option>
     <option value="Systems Security and Malicious Code Analysis CS6332">CS6332 - Systems Security and Malicious Code Analysis</option>
     <option value="Algorithms in Computational Biology CS6333">CS6333 - Algorithms in Computational Biology</option>
     <option value="Virtual Reality CS6334">CS6334 - Virtual Reality</option>
     <option value="Wireless Networks CS6340">CS6340 - Wireless Networks</option>   
     <option value="Cloud Computing CS6343">CS6343 - Cloud Computing</option>
     <option value="Data Representation CS6344">CS6344 - Data Representation</option>
     <option value="Statistical Methods in AI and Machine Learning CS6347">CS6347 - Statistical Methods in AI and Machine Learning</option>
     <option value="Data and Applications Security CS6349">CS6349 - Data and Applications Security</option>
     <option value="Network Security CS6350">CS6350 - Network Security</option>
     <option value="Big Data Management and Analytics CS6352">CS6352 - Big Data Management and Analytics</option>
     <option value="Performance of Computer Systems and Networks CS6353">CS6353 - Performance of Computer Systems and Networks</option>
     <option value="Software Maintenance, Evolution, and Re-Engineering CS6356">CS6356 - Software Maintenance, Evolution, and Re-Engineering</option>
     <option value="Object-Oriented Analysis and Design CS6359">CS6359 - Object-Oriented Analysis and Design</option>
     <option value="Advanced Requirements Engineering CS6361">CS6361 - Advanced Requirements Engineering</option>
     <option value="Data and Text Mining for Computational Biology CS6365">CS6365 - Data and Text Mining for Computational Biology</option>
     <option value="Computer Graphics CS6366">CS6366 - Computer Graphics</option>   
     <option value="Software Testing, Validation and Verification CS6367">CS6367 - Software Testing, Validation and Verification</option>
     <option value="Telecommunication Network Management CS6368">CS6368 - Telecommunication Network Management</option>
     <option value="Complexity of Combinatorial Algorithms CS6369">CS6369 - Complexity of Combinatorial Algorithms</option>
     <option value="Advanced Programming Languages CS6371">CS 6371 - Advanced Programming Languages</option>
     <option value="Intelligent Systems CS6373">CS6373 - Intelligent Systems</option>
     <option value="Computational Logic CS6374">CS6374 - Computational Logic</option>
     <option value="Parallel Processing CS6376">CS6376 - Parallel Processing</option>
     <option value="Introduction to Cryptography CS6377">CS6377 - Introduction to Cryptography</option>
     <option value="Biological Database Systems and Data Mining CS6379">CS6379 - Biological Database Systems and Data Mining </option>
     <option value="Distributed Computing CS6380">CS6380 - Distributed Computing </option>
     <option value="Combinatorics and Graph Algorithms CS6381">CS6381 - Combinatorics and Graph Algorithms</option>
     <option value="Theory of ComputationCS6382">CS 6382 - Theory of Computation</option>
     <option value="Computational Systems Biology CS6383">CS6383 - Computational Systems Biology</option>
     <option value="Computer Vision CS6384">CS 6384 - Computer Vision </option>
     <option value="Algorithmic Aspects of Telecommunication Networks CS6385">CS6385 - Algorithmic Aspects of Telecommunication Networks</option>
     <option value="Telecommunication Software Design CS6386">CS6386 - Telecommunication Software Design</option>
     <option value="Advanced Computer Networks CS6390">CS6390 - Advanced Computer Networks </option>
	 <option value="Optical Networks CS6391">CS6391 - Optical Networks </option>
 	 <option value="Mobile Computing Systems CS6392">CS6392 - Mobile Computing Systems</option>
 	 <option value="Advanced Algorithms in Biology CS6393">CS6393 - Advanced Algorithms in Biology</option>
 	 <option value="Speech Recognition, Synthesis, and Understanding CS6395">CS6395 - Speech Recognition, Synthesis, and Understanding</option>
 	 <option value="Real-Time Systems CS6396">CS6396 -  Real-Time Systems</option>
 	 <option value="Synthesis and Optimization of High-Performance Systems CS6397">CS6397 - Synthesis and Optimization of High-Performance Systems</option>
 	 <option value="DSP Architectures CS6398">CS6398 - DSP Architectures</option>
 	 <option value="Parallel Architectures and Systems CS6399">CS6399 - Parallel Architectures and Systems</option>  
 </select>
    </td>
    <td><input type="text" name="row8sem" value="<?php echo $row['elec2sem']?>"></td>
   <td><input type="text" name="row8transfer"></td>
   <td><input type="text" name="row8grade" value="<?php echo $row['elec2grade']?>"></td>
   </tr>
   <tr>
    <td><select id="ele3" name="elec3" class ="Elective"  value="Choose one of the electives " style="width: 200px" required>
     <option value="Special Topics in Computer ScienceI CS6301">CS6301 - Special Topics in Computer ScienceI</option>
     <option value="Special Topics in Computer ScienceII CS6302">CS6302 - Special Topics in Computer ScienceII</option>
     <option value="Computer Architecture CS6304">CS6307 - Computer Architecture</option>
     <option value="Introduction to Big Data Management and Analytics CS6307">CS6307 - Introduction to Big Data Management and Analytics</option>
     <option value="Statistical Methods for Data Science CS6313">CS6313 - Statistical Methods for Data Science</option>
     <option value="Web Programming Languages CS6314">CS6314 - Web Programming Languages</option>
     <option value="Semantic Web CS6315">CS6315 - Semantic Web</option>
     <option value="Discourse Processing CS6321">CS6321 - Discourse Processing</option>
     <option value="Information Retrieval CS6322">CS6322 - Information Retrieval</option>
     <option value="Computer Animation and Gaming CS6323">CS6323 - Computer Animation and Gaming</option>
     <option value="Information Security CS6324">CS6324 - Information Security</option>
     <option value="Introduction to Bioinformatics CS6325">CS6325 - Introduction to Bioinformatics</option>
     <option value="Human Computer Interactions CS6326">CS6326 - Human Computer Interactions</option>
     <option value="Video Analytics CS6327">CS6327 - Video Analytics</option>
     <option value="Modeling and Simulation CS6328">CS6328 - Modeling and Simulation</option>
     <option value="Multimedia Systems CS6331">CS6331 - Multimedia Systems</option>
     <option value="Systems Security and Malicious Code Analysis CS6332">CS6332 - Systems Security and Malicious Code Analysis</option>
     <option value="Algorithms in Computational Biology CS6333">CS6333 - Algorithms in Computational Biology</option>
     <option value="Virtual Reality CS6334">CS6334 - Virtual Reality</option>
     <option value="Wireless Networks CS6340">CS6340 - Wireless Networks</option>   
     <option value="Cloud Computing CS6343">CS6343 - Cloud Computing</option>
     <option value="Data Representation CS6344">CS6344 - Data Representation</option>
     <option value="Statistical Methods in AI and Machine Learning CS6347">CS6347 - Statistical Methods in AI and Machine Learning</option>
     <option value="Data and Applications Security CS6349">CS6349 - Data and Applications Security</option>
     <option value="Network Security CS6350">CS6350 - Network Security</option>
     <option value="Big Data Management and Analytics CS6352">CS6352 - Big Data Management and Analytics</option>
     <option value="Performance of Computer Systems and Networks CS6353">CS6353 - Performance of Computer Systems and Networks</option>
     <option value="Software Maintenance, Evolution, and Re-Engineering CS6356">CS6356 - Software Maintenance, Evolution, and Re-Engineering</option>
     <option value="Object-Oriented Analysis and Design CS6359">CS6359 - Object-Oriented Analysis and Design</option>
     <option value="Advanced Requirements Engineering CS6361">CS6361 - Advanced Requirements Engineering</option>
     <option value="Data and Text Mining for Computational Biology CS6365">CS6365 - Data and Text Mining for Computational Biology</option>
     <option value="Computer Graphics CS6366">CS6366 - Computer Graphics</option>   
     <option value="Software Testing, Validation and Verification CS6367">CS6367 - Software Testing, Validation and Verification</option>
     <option value="Telecommunication Network Management CS6368">CS6368 - Telecommunication Network Management</option>
     <option value="Complexity of Combinatorial Algorithms CS6369">CS6369 - Complexity of Combinatorial Algorithms</option>
     <option value="Advanced Programming Languages CS6371">CS 6371 - Advanced Programming Languages</option>
     <option value="Intelligent Systems CS6373">CS6373 - Intelligent Systems</option>
     <option value="Computational Logic CS6374">CS6374 - Computational Logic</option>
     <option value="Parallel Processing CS6376">CS6376 - Parallel Processing</option>
     <option value="Introduction to Cryptography CS6377">CS6377 - Introduction to Cryptography</option>
     <option value="Biological Database Systems and Data Mining CS6379">CS6379 - Biological Database Systems and Data Mining </option>
     <option value="Distributed Computing CS6380">CS6380 - Distributed Computing </option>
     <option value="Combinatorics and Graph Algorithms CS6381">CS6381 - Combinatorics and Graph Algorithms</option>
     <option value="Theory of ComputationCS6382">CS 6382 - Theory of Computation</option>
     <option value="Computational Systems Biology CS6383">CS6383 - Computational Systems Biology</option>
     <option value="Computer Vision CS6384">CS 6384 - Computer Vision </option>
     <option value="Algorithmic Aspects of Telecommunication Networks CS6385">CS6385 - Algorithmic Aspects of Telecommunication Networks</option>
     <option value="Telecommunication Software Design CS6386">CS6386 - Telecommunication Software Design</option>
     <option value="Advanced Computer Networks CS6390">CS6390 - Advanced Computer Networks </option>
	 <option value="Optical Networks CS6391">CS6391 - Optical Networks </option>
 	 <option value="Mobile Computing Systems CS6392">CS6392 - Mobile Computing Systems</option>
 	 <option value="Advanced Algorithms in Biology CS6393">CS6393 - Advanced Algorithms in Biology</option>
 	 <option value="Speech Recognition, Synthesis, and Understanding CS6395">CS6395 - Speech Recognition, Synthesis, and Understanding</option>
 	 <option value="Real-Time Systems CS6396">CS6396 -  Real-Time Systems</option>
 	 <option value="Synthesis and Optimization of High-Performance Systems CS6397">CS6397 - Synthesis and Optimization of High-Performance Systems</option>
 	 <option value="DSP Architectures CS6398">CS6398 - DSP Architectures</option>
 	 <option value="Parallel Architectures and Systems CS6399">CS6399 - Parallel Architectures and Systems</option>  
 </select>
    </td>
    <td><input type="text" name="row9sem" value="<?php echo $row['elec3sem']?>"></td>
   <td><input type="text" name="row9transfer"></td>
   <td><input type="text" name="row9grade"value="<?php echo $row['elec3grade']?>"></td>
   </tr>
   <tr>
    <td><select id="ele4" name="elec4" class ="Elective" value="Choose one of the electives " style="width: 200px" required>
     <option value="Special Topics in Computer ScienceI CS6301">CS6301 - Special Topics in Computer ScienceI</option>
     <option value="Special Topics in Computer ScienceII CS6302">CS6302 - Special Topics in Computer ScienceII</option>
     <option value="Computer Architecture CS6304">CS6307 - Computer Architecture</option>
     <option value="Introduction to Big Data Management and Analytics CS6307">CS6307 - Introduction to Big Data Management and Analytics</option>
     <option value="Statistical Methods for Data Science CS6313">CS6313 - Statistical Methods for Data Science</option>
     <option value="Web Programming Languages CS6314">CS6314 - Web Programming Languages</option>
     <option value="Semantic Web CS6315">CS6315 - Semantic Web</option>
     <option value="Discourse Processing CS6321">CS6321 - Discourse Processing</option>
     <option value="Information Retrieval CS6322">CS6322 - Information Retrieval</option>
     <option value="Computer Animation and Gaming CS6323">CS6323 - Computer Animation and Gaming</option>
     <option value="Information Security CS6324">CS6324 - Information Security</option>
     <option value="Introduction to Bioinformatics CS6325">CS6325 - Introduction to Bioinformatics</option>
     <option value="Human Computer Interactions CS6326">CS6326 - Human Computer Interactions</option>
     <option value="Video Analytics CS6327">CS6327 - Video Analytics</option>
     <option value="Modeling and Simulation CS6328">CS6328 - Modeling and Simulation</option>
     <option value="Multimedia Systems CS6331">CS6331 - Multimedia Systems</option>
     <option value="Systems Security and Malicious Code Analysis CS6332">CS6332 - Systems Security and Malicious Code Analysis</option>
     <option value="Algorithms in Computational Biology CS6333">CS6333 - Algorithms in Computational Biology</option>
     <option value="Virtual Reality CS6334">CS6334 - Virtual Reality</option>
     <option value="Wireless Networks CS6340">CS6340 - Wireless Networks</option>   
     <option value="Cloud Computing CS6343">CS6343 - Cloud Computing</option>
     <option value="Data Representation CS6344">CS6344 - Data Representation</option>
     <option value="Statistical Methods in AI and Machine Learning CS6347">CS6347 - Statistical Methods in AI and Machine Learning</option>
     <option value="Data and Applications Security CS6349">CS6349 - Data and Applications Security</option>
     <option value="Network Security CS6350">CS6350 - Network Security</option>
     <option value="Big Data Management and Analytics CS6352">CS6352 - Big Data Management and Analytics</option>
     <option value="Performance of Computer Systems and Networks CS6353">CS6353 - Performance of Computer Systems and Networks</option>
     <option value="Software Maintenance, Evolution, and Re-Engineering CS6356">CS6356 - Software Maintenance, Evolution, and Re-Engineering</option>
     <option value="Object-Oriented Analysis and Design CS6359">CS6359 - Object-Oriented Analysis and Design</option>
     <option value="Advanced Requirements Engineering CS6361">CS6361 - Advanced Requirements Engineering</option>
     <option value="Data and Text Mining for Computational Biology CS6365">CS6365 - Data and Text Mining for Computational Biology</option>
     <option value="Computer Graphics CS6366">CS6366 - Computer Graphics</option>   
     <option value="Software Testing, Validation and Verification CS6367">CS6367 - Software Testing, Validation and Verification</option>
     <option value="Telecommunication Network Management CS6368">CS6368 - Telecommunication Network Management</option>
     <option value="Complexity of Combinatorial Algorithms CS6369">CS6369 - Complexity of Combinatorial Algorithms</option>
     <option value="Advanced Programming Languages CS6371">CS 6371 - Advanced Programming Languages</option>
     <option value="Intelligent Systems CS6373">CS6373 - Intelligent Systems</option>
     <option value="Computational Logic CS6374">CS6374 - Computational Logic</option>
     <option value="Parallel Processing CS6376">CS6376 - Parallel Processing</option>
     <option value="Introduction to Cryptography CS6377">CS6377 - Introduction to Cryptography</option>
     <option value="Biological Database Systems and Data Mining CS6379">CS6379 - Biological Database Systems and Data Mining </option>
     <option value="Distributed Computing CS6380">CS6380 - Distributed Computing </option>
     <option value="Combinatorics and Graph Algorithms CS6381">CS6381 - Combinatorics and Graph Algorithms</option>
     <option value="Theory of ComputationCS6382">CS 6382 - Theory of Computation</option>
     <option value="Computational Systems Biology CS6383">CS6383 - Computational Systems Biology</option>
     <option value="Computer Vision CS6384">CS 6384 - Computer Vision </option>
     <option value="Algorithmic Aspects of Telecommunication Networks CS6385">CS6385 - Algorithmic Aspects of Telecommunication Networks</option>
     <option value="Telecommunication Software Design CS6386">CS6386 - Telecommunication Software Design</option>
     <option value="Advanced Computer Networks CS6390">CS6390 - Advanced Computer Networks </option>
	 <option value="Optical Networks CS6391">CS6391 - Optical Networks </option>
 	 <option value="Mobile Computing Systems CS6392">CS6392 - Mobile Computing Systems</option>
 	 <option value="Advanced Algorithms in Biology CS6393">CS6393 - Advanced Algorithms in Biology</option>
 	 <option value="Speech Recognition, Synthesis, and Understanding CS6395">CS6395 - Speech Recognition, Synthesis, and Understanding</option>
 	 <option value="Real-Time Systems CS6396">CS6396 -  Real-Time Systems</option>
 	 <option value="Synthesis and Optimization of High-Performance Systems CS6397">CS6397 - Synthesis and Optimization of High-Performance Systems</option>
 	 <option value="DSP Architectures CS6398">CS6398 - DSP Architectures</option>
 	 <option value="Parallel Architectures and Systems CS6399">CS6399 - Parallel Architectures and Systems</option>  
 </select>
    </td>
    <td><input type="text" name="row10sem" value="<?php echo $row['elec4sem']?>"></td>
   <td><input type="text" name="row10transfer"></td>
   <td><input type="text" name="row10grade" value="<?php echo $row['elec4grade']?>"></td>
   </tr>
   <tr>
    <td><select id="ele5"  name="elec5" class ="Elective" value="Choose one of the electives " style="width: 200px" required>
     <option value="Special Topics in Computer ScienceI CS6301">CS6301 - Special Topics in Computer ScienceI</option>
     <option value="Special Topics in Computer ScienceII CS6302">CS6302 - Special Topics in Computer ScienceII</option>
     <option value="Computer Architecture CS6304">CS6307 - Computer Architecture</option>
     <option value="Introduction to Big Data Management and Analytics CS6307">CS6307 - Introduction to Big Data Management and Analytics</option>
     <option value="Statistical Methods for Data Science CS6313">CS6313 - Statistical Methods for Data Science</option>
     <option value="Web Programming Languages CS6314">CS6314 - Web Programming Languages</option>
     <option value="Semantic Web CS6315">CS6315 - Semantic Web</option>
     <option value="Discourse Processing CS6321">CS6321 - Discourse Processing</option>
     <option value="Information Retrieval CS6322">CS6322 - Information Retrieval</option>
     <option value="Computer Animation and Gaming CS6323">CS6323 - Computer Animation and Gaming</option>
     <option value="Information Security CS6324">CS6324 - Information Security</option>
     <option value="Introduction to Bioinformatics CS6325">CS6325 - Introduction to Bioinformatics</option>
     <option value="Human Computer Interactions CS6326">CS6326 - Human Computer Interactions</option>
     <option value="Video Analytics CS6327">CS6327 - Video Analytics</option>
     <option value="Modeling and Simulation CS6328">CS6328 - Modeling and Simulation</option>
     <option value="Multimedia Systems CS6331">CS6331 - Multimedia Systems</option>
     <option value="Systems Security and Malicious Code Analysis CS6332">CS6332 - Systems Security and Malicious Code Analysis</option>
     <option value="Algorithms in Computational Biology CS6333">CS6333 - Algorithms in Computational Biology</option>
     <option value="Virtual Reality CS6334">CS6334 - Virtual Reality</option>
     <option value="Wireless Networks CS6340">CS6340 - Wireless Networks</option>   
     <option value="Cloud Computing CS6343">CS6343 - Cloud Computing</option>
     <option value="Data Representation CS6344">CS6344 - Data Representation</option>
     <option value="Statistical Methods in AI and Machine Learning CS6347">CS6347 - Statistical Methods in AI and Machine Learning</option>
     <option value="Data and Applications Security CS6349">CS6349 - Data and Applications Security</option>
     <option value="Network Security CS6350">CS6350 - Network Security</option>
     <option value="Big Data Management and Analytics CS6352">CS6352 - Big Data Management and Analytics</option>
     <option value="Performance of Computer Systems and Networks CS6353">CS6353 - Performance of Computer Systems and Networks</option>
     <option value="Software Maintenance, Evolution, and Re-Engineering CS6356">CS6356 - Software Maintenance, Evolution, and Re-Engineering</option>
     <option value="Object-Oriented Analysis and Design CS6359">CS6359 - Object-Oriented Analysis and Design</option>
     <option value="Advanced Requirements Engineering CS6361">CS6361 - Advanced Requirements Engineering</option>
     <option value="Data and Text Mining for Computational Biology CS6365">CS6365 - Data and Text Mining for Computational Biology</option>
     <option value="Computer Graphics CS6366">CS6366 - Computer Graphics</option>   
     <option value="Software Testing, Validation and Verification CS6367">CS6367 - Software Testing, Validation and Verification</option>
     <option value="Telecommunication Network Management CS6368">CS6368 - Telecommunication Network Management</option>
     <option value="Complexity of Combinatorial Algorithms CS6369">CS6369 - Complexity of Combinatorial Algorithms</option>
     <option value="Advanced Programming Languages CS6371">CS 6371 - Advanced Programming Languages</option>
     <option value="Intelligent Systems CS6373">CS6373 - Intelligent Systems</option>
     <option value="Computational Logic CS6374">CS6374 - Computational Logic</option>
     <option value="Parallel Processing CS6376">CS6376 - Parallel Processing</option>
     <option value="Introduction to Cryptography CS6377">CS6377 - Introduction to Cryptography</option>
     <option value="Biological Database Systems and Data Mining CS6379">CS6379 - Biological Database Systems and Data Mining </option>
     <option value="Distributed Computing CS6380">CS6380 - Distributed Computing </option>
     <option value="Combinatorics and Graph Algorithms CS6381">CS6381 - Combinatorics and Graph Algorithms</option>
     <option value="Theory of ComputationCS6382">CS 6382 - Theory of Computation</option>
     <option value="Computational Systems Biology CS6383">CS6383 - Computational Systems Biology</option>
     <option value="Computer Vision CS6384">CS 6384 - Computer Vision </option>
     <option value="Algorithmic Aspects of Telecommunication Networks CS6385">CS6385 - Algorithmic Aspects of Telecommunication Networks</option>
     <option value="Telecommunication Software Design CS6386">CS6386 - Telecommunication Software Design</option>
     <option value="Advanced Computer Networks CS6390">CS6390 - Advanced Computer Networks </option>
	 <option value="Optical Networks CS6391">CS6391 - Optical Networks </option>
 	 <option value="Mobile Computing Systems CS6392">CS6392 - Mobile Computing Systems</option>
 	 <option value="Advanced Algorithms in Biology CS6393">CS6393 - Advanced Algorithms in Biology</option>
 	 <option value="Speech Recognition, Synthesis, and Understanding CS6395">CS6395 - Speech Recognition, Synthesis, and Understanding</option>
 	 <option value="Real-Time Systems CS6396">CS6396 -  Real-Time Systems</option>
 	 <option value="Synthesis and Optimization of High-Performance Systems CS6397">CS6397 - Synthesis and Optimization of High-Performance Systems</option>
 	 <option value="DSP Architectures CS6398">CS6398 - DSP Architectures</option>
 	 <option value="Parallel Architectures and Systems CS6399">CS6399 - Parallel Architectures and Systems</option>  
 </select>
    </td>
    <td><input type="text" name="row11sem" value="<?php echo $row['elec5sem']?>"></td>
   <td><input type="text" name="row11transfer"></td>
   <td><input type="text" name="row11grade"value="<?php echo $row['elec5grade']?>"></td>
   </tr>
	</tbody>
	</table>

    	
    		<table >
	 <thead>
	 <th>Course Title and Course Number</th>
     <th>UTD Semester</th>
     <th>Transfer</th>
     <th>Grade</th>
     <tr>	
    <th  colspan="4"> ADDITIONAL ELECTIVES        3 CREDIT HOURS MINIMUM </th>
    </tr>
    </thead>
    <tbody>
    <td><select id="ele6" name="elec6" class ="Elective" value="Choose one of the electives " style="width: 200px" required>
    <option value="Special Topics in Computer ScienceI CS6301">CS6301 - Special Topics in Computer ScienceI</option>
    <option value="Special Topics in Computer ScienceII CS6302">CS6302 - Special Topics in Computer ScienceII</option>
    <option value="Computer Architecture CS6304">CS6307 - Computer Architecture</option>
    <option value="Introduction to Big Data Management and Analytics CS6307">CS6307 - Introduction to Big Data Management and Analytics</option>
    <option value="Statistical Methods for Data Science CS6313">CS6313 - Statistical Methods for Data Science</option>
    <option value="Web Programming Languages CS6314">CS6314 - Web Programming Languages</option>
    <option value="Semantic Web CS6315">CS6315 - Semantic Web</option>
    <option value="Discourse Processing CS6321">CS6321 - Discourse Processing</option>
    <option value="Information Retrieval CS6322">CS6322 - Information Retrieval</option>
    <option value="Computer Animation and Gaming CS6323">CS6323 - Computer Animation and Gaming</option>
    <option value="Information Security CS6324">CS6324 - Information Security</option>
    <option value="Introduction to Bioinformatics CS6325">CS6325 - Introduction to Bioinformatics</option>
    <option value="Human Computer Interactions CS6326">CS6326 - Human Computer Interactions</option>
    <option value="Video Analytics CS6327">CS6327 - Video Analytics</option>
    <option value="Modeling and Simulation CS6328">CS6328 - Modeling and Simulation</option>
    <option value="Multimedia Systems CS6331">CS6331 - Multimedia Systems</option>
    <option value="Systems Security and Malicious Code Analysis CS6332">CS6332 - Systems Security and Malicious Code Analysis</option>
    <option value="Algorithms in Computational Biology CS6333">CS6333 - Algorithms in Computational Biology</option>
    <option value="Virtual Reality CS6334">CS6334 - Virtual Reality</option>
    <option value="Wireless Networks CS6340">CS6340 - Wireless Networks</option>   
    <option value="Cloud Computing CS6343">CS6343 - Cloud Computing</option>
    <option value="Data Representation CS6344">CS6344 - Data Representation</option>
    <option value="Statistical Methods in AI and Machine Learning CS6347">CS6347 - Statistical Methods in AI and Machine Learning</option>
    <option value="Data and Applications Security CS6349">CS6349 - Data and Applications Security</option>
    <option value="Network Security CS6350">CS6350 - Network Security</option>
    <option value="Big Data Management and Analytics CS6352">CS6352 - Big Data Management and Analytics</option>
    <option value="Performance of Computer Systems and Networks CS6353">CS6353 - Performance of Computer Systems and Networks</option>
    <option value="Software Maintenance, Evolution, and Re-Engineering CS6356">CS6356 - Software Maintenance, Evolution, and Re-Engineering</option>
    <option value="Object-Oriented Analysis and Design CS6359">CS6359 - Object-Oriented Analysis and Design</option>
    <option value="Advanced Requirements Engineering CS6361">CS6361 - Advanced Requirements Engineering</option>
    <option value="Data and Text Mining for Computational Biology CS6365">CS6365 - Data and Text Mining for Computational Biology</option>
    <option value="Computer Graphics CS6366">CS6366 - Computer Graphics</option>   
    <option value="Software Testing, Validation and Verification CS6367">CS6367 - Software Testing, Validation and Verification</option>
    <option value="Telecommunication Network Management CS6368">CS6368 - Telecommunication Network Management</option>
    <option value="Complexity of Combinatorial Algorithms CS6369">CS6369 - Complexity of Combinatorial Algorithms</option>
    <option value="Advanced Programming Languages CS6371">CS 6371 - Advanced Programming Languages</option>
    <option value="Intelligent Systems CS6373">CS6373 - Intelligent Systems</option>
    <option value="Computational Logic CS6374">CS6374 - Computational Logic</option>
    <option value="Parallel Processing CS6376">CS6376 - Parallel Processing</option>
    <option value="Introduction to Cryptography CS6377">CS6377 - Introduction to Cryptography</option>
    <option value="Biological Database Systems and Data Mining CS6379">CS6379 - Biological Database Systems and Data Mining </option>
    <option value="Distributed Computing CS6380">CS6380 - Distributed Computing </option>
    <option value="Combinatorics and Graph Algorithms CS6381">CS6381 - Combinatorics and Graph Algorithms</option>
    <option value="Theory of ComputationCS6382">CS 6382 - Theory of Computation</option>
    <option value="Computational Systems Biology CS6383">CS6383 - Computational Systems Biology</option>
    <option value="Computer Vision CS6384">CS 6384 - Computer Vision </option>
    <option value="Algorithmic Aspects of Telecommunication Networks CS6385">CS6385 - Algorithmic Aspects of Telecommunication Networks</option>
    <option value="Telecommunication Software Design CS6386">CS6386 - Telecommunication Software Design</option>
    <option value="Advanced Computer Networks CS6390">CS6390 - Advanced Computer Networks </option>
	<option value="Optical Networks CS6391">CS6391 - Optical Networks </option>
 	<option value="Mobile Computing Systems CS6392">CS6392 - Mobile Computing Systems</option>
 	<option value="Advanced Algorithms in Biology CS6393">CS6393 - Advanced Algorithms in Biology</option>
 	<option value="Speech Recognition, Synthesis, and Understanding CS6395">CS6395 - Speech Recognition, Synthesis, and Understanding</option>
 	<option value="Real-Time Systems CS6396">CS6396 -  Real-Time Systems</option>
 	<option value="Synthesis and Optimization of High-Performance Systems CS6397">CS6397 - Synthesis and Optimization of High-Performance Systems</option>
 	<option value="DSP Architectures CS6398">CS6398 - DSP Architectures</option>
 	<option value="Parallel Architectures and Systems CS6399">CS6399 - Parallel Architectures and Systems</option> 
    <option value="Professional and Technical Communication CS5301">CS5301 - Professional and Technical Communication</option>
	<option value="Topics in Computer Science CS5302">CS5302 - Topics in Computer Science</option>
	<option value="Discrete Structures CS5333">CS5333 - Discrete Structures </option>
	<option value="Programming Projects in Java CS5336">CS5336 - Programming Projects in Java</option>
	<option value="Automata Theory CS5349">CS5349 - Automata Theory </option>
	<option value="Principles of UNIX CS5375">CS5375 - Principles of UNIX</option>
	<option value="Computer Networks CS5390">CS5390 - Computer Networks</option>	
 </select>
    </td>
    <td><input type="text" name="row12sem" value="<?php echo $row['elec6sem']?>"></td>
   <td><input type="text" name="row12transfer"></td>
   <td><input type="text" name="row12grade" value="<?php echo $row['elec6grade']?>"></td>

	</tbody>
	</table>

    	
    		<table  >
    			<thead>
 <tr>
 <th></th>
<th>Admission Prerequisites</th>
<th>Course</th>
<th>UTD Semester</th>
<th>Waiver</th>
 <th>Grade</th>
</tr>
 
 </thead>
   <tbody>
   <tr>
   <td><input type="checkbox" name="prereq1" value="Computer Science I CS5303" <?php if($row['prereq1']) echo "checked"?>></td>
   <td> Computer Science I </td>
   <td> CS 5303</td>
   <td><input type="text" name="row13sem" value="<?php echo $row['prereq1sem']?>"></td>
   <td><input type="text" name="row13waiver"></td>
   <td><input type="text" name="row13grade" value="<?php echo $row['prereq1grade']?>"></td>
   </tr>
 <tr>
   <td><input type="checkbox" name="prereq2" value="Computer Science II CS 5330" <?php if($row['prereq2']) echo "checked"?>></td>
   <td> Computer Science II</td>
   <td> CS 5330</td>
   <td><input type="text" name="row14sem" value="<?php echo $row['prereq2sem']?>"></td>
   <td><input type="text" name="row14waiver"></td>
   <td><input type="text" name="row14grade" value="<?php echo $row['prereq2grade']?>"></td>
   </tr>
 <tr>
   <td><input type="checkbox" name="prereq3" value="Discrete Structures CS 5333" <?php if($row['prereq3']) echo "checked"?>></td>
   <td> Discrete Structures</td>
   <td> CS 5333</td>
   <td><input type="text" name="row15sem" value="<?php echo $row['prereq3sem']?>"></td>
   <td><input type="text" name="row15waiver"></td>
   <td><input type="text" name="row15grade"value="<?php echo $row['prereq3grade']?>"></td>
   </tr>
 <tr>
   <td><input type="checkbox" name="prereq4" value="Algorithm Analysis & Data Structures CS 5343" <?php if($row['prereq4']) echo "checked"?>></td>
   <td> Algorithm Analysis & Data Structures</td>
   <td> CS 5343</td>
   <td><input type="text" name="row16sem" value="<?php echo $row['prereq4sem']?>"></td>
   <td><input type="text" name="row16waiver"></td>
   <td><input type="text" name="row16grade" value="<?php echo $row['prereq4grade']?>"></td>
   </tr>
 <tr>
   <td><input type="checkbox" name="prereq5" id ="OS" value="Operating Systems Concepts CS 5348" <?php if($row['prereq5']) echo "checked"?>></td>
   <td> Operating Systems Concepts</td>
   <td> CS 5348</td>
   <td><input type="text" name="row17sem" value="<?php echo $row['prereq5sem']?>"></td>
   <td><input type="text" name="row17waiver"></td>
   <td><input type="text" name="row17grade" value="<?php echo $row['prereq5grade']?>"></td>
   </tr>
<tr>
   <td><input type="checkbox" name="prereq6" value="Software Engineering CS 5354" <?php if($row['prereq6']) echo "checked"?>></td>
   <td> Software Engineering</td>
   <td> CS 5354</td>
   <td><input type="text" name="row18sem"value="<?php echo $row['prereq6sem']?>"></td>
   <td><input type="text" name="row18waiver"></td>
   <td><input type="text" name="row18grade" value="<?php echo $row['prereq6grade']?>"></td>
   </tr>
   
    
   </tbody>
    		</table>
			<button type="submit" name="update" > Update</button> 
			
			
		
	
</form>
	
	
	
	
	 
	<script>

	
function AdOS()
{
	if(document.getElementById("AOS").checked)
	document.getElementById("OS").checked = true;
}
function DBD()
{
	if(document.getElementById("DbD").checked)
	document.getElementById("OS").checked = false;
}	
	
var val1 ="<?php echo $row['elec1'];?>";
var val2 ="<?php echo $row['elec2'];?>";
var val3 ="<?php echo $row['elec3'];?>";
var val4 ="<?php echo $row['elec4'];?>";
var val5 ="<?php echo $row['elec5'];?>";
var val6 ="<?php echo $row['elec6'];?>";
var sel1 = document.getElementById('ele1');
var sel2 = document.getElementById('ele2');
var sel3 = document.getElementById('ele3');
var sel4 = document.getElementById('ele4');
var sel5 = document.getElementById('ele5');
var sel6 = document.getElementById('ele6');
	
  var opts = sel1.options;
  var opts6 = sel6.options;
  //console.log(opts);
  for (var j = 0; j<opts.length; j++) {
	  
    if (opts[j].value == val1) 
		//console.log(opts[j].value);
      sel1.selectedIndex = j;
     // break;
	 if (opts[j].value == val2) 
      sel2.selectedIndex = j;
     if (opts[j].value == val3) 
      sel3.selectedIndex = j;
     if (opts[j].value == val4) 
      sel4.selectedIndex = j;
     if (opts[j].value == val5) 
      sel5.selectedIndex = j; 
        }
		for(var i=0; i<opts6.length;i++)
		{
			if(opts6[i].value == val6)
				sel6.selectedIndex = i;
		}

</script>
</body>
</html>


