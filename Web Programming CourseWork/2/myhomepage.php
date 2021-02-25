<?php
session_start();
?>
<!DOCTYPE html>

<html>

<head>
    <title>
      My Courses
    </title>
    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="myhomepage.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="jquery.js"></script>
  <script src="js/bootstrap.js"></script>
</head>

<body>
    <h1>Welcome ! This is your course home page.
</h1>
<div class="myPageLogout">
<button type = "button">
<a href="profilepage.php" title="profilepage"> Profile </a></button>
<button type = "button">
<a href="logout.php" title="logout"> Logout </a></button></div>

    <script>
        function courseHandler(course_id, course_title, course_description, course_hours) {
            document.getElementById(course_id.id).style.display='block';
        }
        $(document).ready(function(){
       $("#search").keyup(function(){
          var query = $(this).val();
          if (query != "") {
            $.ajax({
              url: 'searchcourses.php',
              method: 'POST',
              data: {query:query},
              success: function(data){
 
                document.getElementById("result").innerHTML=data;
                $('#result').css('display', 'block');
               
                
                $("#search").focusin(function(){
                    $('#result').css('display', 'block');
                });
              }
            });
          } else {
          $('#result').css('display', 'none');
        }
      });
    });
    </script>

    <div>
      <div class="col-sm-3 col-md-6 col-lg-9">
        
        <div class="mySearchBar">
        <h2>Find Courses</h2>
          <input type="text" id="search" placeholder="enter courseid...." >
        </div>
        <div id="result"></div>
        <div>
    <div >
     
    <?php
    if(!isset($_SESSION["UserId"])) {
      header("Location:authenticate.php");
      }
      if(isset($_SESSION["UserId"])) {

        require_once 'login.php'; //Logging into database
    $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    $Login_Time = date("Y-m-d h:i:sa");
    $User_Id = $_SESSION["UserId"];

    $query1 = "INSERT INTO userlog (UserId, Login_Time) VALUES ('$User_Id', '$Login_Time')";

    $result   = $connection->query($query1);

  	if (!$result) {echo "INSERT failed: $query1<br>" .
	    $connection->error . "<br><br>";}

?> 
    </div>
	<form name="degplan" action="plansubmit.php" method = "post" >
    <table>
      
      <table class="studentFormDetails"><tbody><tr><th>
      Name of Student   </th> <th>       <input type="text" name="namestud"></th></tr><tr><th>
     Semester Admitted     </th> <th>     <input type="text" name="semadmit"></th></tr><tr><th>
     Anticipated Graduation </th> <th>   <input type="text" name="antgrad"></th></tr></tbody></table>
     
     

    </div>
    <div >
    	<div >
          <table   >

     <thead>
  
  <tr>
    <th colspan="5">CORE COURSES    (15 Credit Hours)       3.19 Grade Point Average Required</th>
  </tr>
  <tr>
    <th >Course Title</th>
    <th>Course# </th>
    <th>Semester</th>
    <th>Transfer</th>
     <th>Grade</th>
  </tr>
   </thead>
   <tbody>
   
   
    <tr>
   <td> Machine Learning</td>
   <td> CS 6375</td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   </tr>
   <tr>
   <td> Artificial Intelligence</td>
   <td> CS 6364</td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   </tr>
  <tr>
   <td> Design and Analysis of Computer Algorithms</td>
   <td> CS 6363</td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   </tr>
   <tr>
   <td>Natural Language Processing</td>
   <td> CS 6320</td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   </tr>
    
   </tbody>
  </table>
    	</div>
    </div>
    <div >
    	<div >
    	 <table  >

     <thead>
     
    <tr>
    <th  colspan="5"> ONE OF THE FOLLOWING TWO CORE COURSES</th></tr>
    <tr>
     <th></th>
     <th>Course Title</th>
    <th>Course #</th>
    <th> Semester</th>
    <th>Transfer</th>
    <th>Grade</th>
    </tr>
    </thead>
    <tbody>
    	<tr>
  <td><input type="radio" name="core5" value="Database Design CS6360"></td>
   <td>Database Design </td>
   <td> CS 6360</td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   </tr>
   <tr>
   <td><input type="radio" name="core5" value="Advanced Operating Systems CS6378"></td>
   <td>Advanced Operating Systems </td>
   <td> CS 6378</td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   </tr>	
	
    </tbody>
    </table>


    </div>
    </div>
    <div >
    	<div >
    <table >
	 <thead>
     <tr>
    <th  colspan="4"> FIVE APPROVED 6000 LEVEL ELECTIVES        15 CREDIT HOURS         3.0 GRADE POINT AVERAGE</th></tr>
     <tr>
     <th>Course#-Course Title</th>
     <th>Semester</th>
     <th>Transfer</th>
     <th>Grade</th>
     </tr>
    
    </thead>
    <tbody>
    	<tr>
    <td><select name="elec1"  value="Choose one of the electives " style="width: 200px">
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
    <td><input type="text" ></td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   </tr>
   <tr>
    <td><select name="elec2"  value="Choose one of the electives " style="width: 200px">
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
    <td><input type="text"></td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   </tr>
   <tr>
    <td><select name="elec3"  value="Choose one of the electives " style="width: 200px">
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
    <td><input type="text" ></td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   </tr>
   <tr>
    <td><select name="elec4"  value="Choose one of the electives " style="width: 200px">
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
    <td><input type="text" ></td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   </tr>
   <tr>
    <td><select name="elec5"  value="Choose one of the electives " style="width: 200px">
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
    <td><input type="text" ></td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   </tr>
	</tbody>
	</table>

    	</div>

    </div>
    
    <div >
    	<div >
    		<table >
	 <thead>
     <tr>	
    <th  colspan="4"> ADDITIONAL ELECTIVES        3 CREDIT HOURS MINIMUM </th>
    </tr><tr>
	 <th>Course# - Course Title</th>
     <th>Semester</th>
     <th>Transfer</th>
     <th>Grade</th></tr>
     
    </thead>
    <tbody>
    <td><select name="elec6"  value="Choose one of the electives " style="width: 200px">
    <option value="Professional and Technical Communication CS5301">CS5301 - Professional and Technical Communication</option>
	<option value="Topics in Computer Science CS5302">CS5302 - Topics in Computer Science</option>
	<option value="Discrete Structures CS5333">CS5333 - Discrete Structures </option>
	<option value="Programming Projects in Java CS5336">CS5336 - Programming Projects in Java</option>
	<option value="Automata Theory CS5349">CS5349 - Automata Theory </option>
	<option value="Principles of UNIX CS5375">CS5375 - Principles of UNIX</option>
	<option value="Computer Networks CS5390">CS5390 - Computer Networks</option>
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
    <td><input type="text" ></td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>

	</tbody>
	</table>

    	</div>
    </div>
    <div >
    	<div >
    		<table  >
    			<thead>
 <tr>
 <th></th>
<th>Admission Prerequisites</th>
<th>Course#</th>
<th>Semester</th>
<th>Waiver</th>
 <th>Grade</th>
</tr>
 
 </thead>
   <tbody>
   <tr>
   <td><input type="checkbox" name="prereq1" value="Computer Science I CS5303"></td>
   <td> Computer Science I </td>
   <td> CS 5303</td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   </tr>
 <tr>
   <td><input type="checkbox" name="prereq2" value="Computer Science II CS 5330"></td>
   <td> Computer Science II</td>
   <td> CS 5330</td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   </tr>
 <tr>
   <td><input type="checkbox" name="prereq3" value="Discrete Structures CS 5333"></td>
   <td> Discrete Structures</td>
   <td> CS 5333</td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   </tr>
 <tr>
   <td><input type="checkbox" name="prereq4" value="Algorithm Analysis & Data Structures CS 5343"></td>
   <td> Algorithm Analysis & Data Structures</td>
   <td> CS 5343</td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   </tr>
 <tr>
   <td><input type="checkbox" name="prereq5" value="Operating Systems Concepts CS 5348"></td>
   <td> Operating Systems Concepts</td>
   <td> CS 5348</td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   </tr>
<tr>
   <td><input type="checkbox" name="prereq6" value="Software Engineering CS 5354"></td>
   <td> Software Engineering</td>
   <td> CS 5354</td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   <td><input type="text" ></td>
   </tr>
   
    
   </tbody>
    		</table>
			
			<button type="submit" name="submit"  > Submit</button> 
			 <button type="reset"> Reset </button>
			
    	</div>
    </div>
      </div>

<?php
if(isset($_POST['logout'])) {
    session_start();
    $Logout_Time = date("Y-m-d h:i:sa");

    $query2 = "UPDATE userlog SET Logout_Time = '$Logout_Time' WHERE UserId = '$User_Id';";

    $result = $connection->query($query2);

  	if (!$result) {echo "INSERT failed: $query2<br>" .
	    $connection->error . "<br><br>";}

    session_unset();
    session_destroy();

    header("Location: authenticate.php");
  }

  

if ($connection->connect_error) die($connection->connect_error);

$query  = mysqli_query($connection, "SELECT * FROM course1");
$loopResult = '';



echo '<div class="col-sm-9 col-md-6 col-lg-3 boxScroll">';

while($row = mysqli_fetch_assoc($query)) {

echo '<div id="\''.$row['course_id'].'\'" class="course pointer" onClick="courseHandler('.$row['course_id'].',\''.$row['course_title'].'\',\''.$row['course_description'].'\',\''.$row['course_hours'].'\')">';
echo '<p><b>Course Id - </b>' .$row['course_id'].'</p>';
echo '<p><b>Course Title - </b>'.$row['course_title'].'</p>';
echo '</div>';

echo '<div id="'.$row['course_id'].'" class="w3-modal">';
echo '<div class="w3-modal-content">';
echo '<div class="w3-container">';
echo '<span onclick="document.getElementById(\''.$row['course_id'].'\').style.display=\'none\'" class="w3-button w3-display-bottomright">&times;</span>';
echo '<p class="detailsHeading"><u>Course Details:</u></p>';
$upperCaseId = strtoupper($row['course_id']);
echo '<p class="details"><b>ID - </b>'.$upperCaseId.'</p>';
echo '<p class="details"><b>Title - </b>'.$row['course_title'].'</p>';
echo '<p class="details"><b>Description - </b>'.$row['course_description'].'</p>';
echo '<p class="details"><b>Credit Hours - </b>'.$row['course_hours'].'</p>';
if($row['course_prerequisite_link'] == null) {
  echo '<p class="details"><b>Pre-requisites - </b>None</p>';
}
else {
  echo '<p class="details"><b>Pre-requisites - </b>'.$row['course_prerequisite_link'].'</p>';
}
if($row['course_corequisite_link'] == null) {
  echo '<p class="details"><b>Co-requisites - </b>None</p>';
}
else {
  echo '<p class="details"><b>Co-requisites - </b>'.$row['course_crequisite_link'].'</p>';
}
echo '</div>';
echo '</div>';
echo '</div>';

}

echo '</div>';
echo '</div>';

?>


</form>
<div >
    	<div >
		<h3>My Degree Plans</h3>
		<?php
 $query2  = "SELECT * FROM degreeplan1";
  $result2 = $connection->query($query2);

  if (!$result2) die($connection->error);

 $rows2 = $result2->num_rows;
  $caseno=1;
  for ($j = 0 ; $j < $rows2 ; ++$j)
  {
    $result2->data_seek($j);
	$row2 = $result2->fetch_array(MYSQLI_ASSOC);
	if($row2['UserId'] == $_SESSION["UserId"])
	{
     $case= $row2['case_name'];
     
     echo '<a href="getplans.php?id='.$case.'">'."Case".$caseno." ".$row2['case_name'].'</a>'.'<br>';
     $caseno++;
	}
  }

$result2->close();
$connection->close();
 ?>
		</div>
		</div>
  </div>
    
           
        
    
<?php
}else echo "<h1>try Login again</h1>";
?>
<footer><div class="myHomePageFooter">
     The University Of Texas at Dallas© &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
     Contact:<a href="mailto:graddegreeplans@utdallas.edu?Subject=My%20Degree%20Plan%20Query" target="_top">graddegreeplans@utdallas.edu</a>

     
  </div>
</footer
</body>

</html>
