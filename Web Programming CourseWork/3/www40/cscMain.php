<?php
session_start();
?>
<html>
<head>
    <title> Home Page </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
if (!isset($_SESSION["UserId"])) {

    header("Location:index.php");
}
if ($_SESSION["UserId"]) {

require_once 'login.php';
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($conn->connect_error) die($conn->connect_error);
$dbquery = "SELECT * FROM users";
$queryresult = $conn->query($dbquery);

if (!$queryresult) die($conn->error);

$elements = $queryresult->num_rows;

for ($j = 0; $j < $elements; ++$j) {
    $queryresult->data_seek($j);
    $ele = $queryresult->fetch_array(MYSQLI_ASSOC);
    if ($ele['UserId'] == $_SESSION["UserId"])
        //  echo $row1['Username'];  $_SESSION["UserId"];
        $_SESSION["Username"] = $ele['Username'];


}

$queryresult->close();

?>

<div>
    <a href="add.php " style="float: left"><input type="button" class="submit" value="Add a New Course"/></a><br>
    <a href="update.php?"style="float: left"><input type="button" class="submit" value="Update a Course"/></a>

    <button type="button" style="float: right">
        <a href="logout.php" title="logout"> Logout </a></button>
</div>
<b>Welcome ! </b>
</div>
<br>
<br>
<form name="courseplan" action="" method="post">
    <select id="filsor" onchange="modDisp();" style="width: 300px">
        <option selected="true" disabled="disabled" value="">Sort By</option>
        <option value="instructor">Lecturer</option>
        <option value="day">Schedule</option>
        <option value="cn">Course Number & Section</option>


    </select>
    <table class="table mytable" ; cellspacing="6px" cellpadding="6%">
        <thead>
        <tr style="background-color: ivory">
            <th>Course Status</th>
            <th>Class Section & Class Number</th>
            <th>Course Title</th>
            <th>Lecturer</th>
            <th>Timings</th>
            <th>Date Created</th>
            <th>Last Updated
            <th>
            <th></th>
        </tr>
        </thead>
        <tbody style="background-color: orange">
        <?php
        if (isset($_GET['order'])) {
            $order = $_GET['order'];
            if ($order == "instructor")
                $query = "SELECT * FROM cscourse GROUP BY Lecturer";
            else if ($order == "cn")
                $query = "SELECT * FROM cscourse GROUP BY courseNumberAndSection";
            else if ($order == "day")
                $query = "SELECT * FROM cscourse GROUP BY Timings";
            $result = $conn->query($query);

            if (!$result) die($conn->error);

            $rows = $result->num_rows;

            for ($j = 0; $j < $rows; ++$j) {
                $result->data_seek($j);
                $row = $result->fetch_array(MYSQLI_ASSOC);

                echo ' <tr>';
                echo '<td>' . $row['courseStatus'] . '</td>';
                echo '<td><div id="filter-fr" value = "' . $row['courseNumberAndSection'] . '" class="filter-class" >' . $row["courseNumberAndSection"] . '</div><br></td>';
                echo '<td> ' . $row['courseTitle'] . '</td>';
                echo "<td><a href=" . $row['lecturerWebpage'] . ">" . $row['Lecturer'] . "</a><br></td>";
                echo '<td>' . $row['Timings'] . '</td>';
                echo '<td>' . $row['dateCreated'] . '</td>';
                echo '<td>' . $row['lastUpdated'] . '</td>';
                echo '<td><a href="delete.php? del=' . $row['courseNumberAndSection'] . '"><input type="button" class="submit" value="X"/></a></td>';
                echo '</tr>';

            }
        } else {
            $query = "SELECT * FROM cscourse";
            $result = $conn->query($query);

            if (!$result) die($conn->error);

            $rows = $result->num_rows;

            for ($j = 0; $j < $rows; ++$j) {
                $result->data_seek($j);
                $row = $result->fetch_array(MYSQLI_ASSOC);

                echo ' <tr>';
                echo '<td>' . $row['courseStatus'] . '</td>';

                echo '<td><div id="filter-fr" value = "' . $row['courseNumberAndSection'] . '" class="filter-class" >' . $row["courseNumberAndSection"] . '</div><br></td>';
                echo '<td> ' . $row['courseTitle'] . '</td>';

                echo "<td><a href=" . $row['lecturerWebpage'] . ">" . $row['Lecturer'] . "</a><br></td>";
                echo '<td>' . $row['Timings'] . '</td>';
                echo '<td>' . $row['dateCreated'] . '</td>';
                echo '<td>' . $row['lastUpdated'] . '</td>';
                echo '<td><a href="delete.php? del=' . $row['courseNumberAndSection'] . '"><input type="button" class="submit" value="X"/></a></td>';

                echo '</tr>';

            }
        }

        $result->close();
        $conn->close();
        }
        ?>
        </tbody>
    </table>

</form>
</div>

</body>
<script type="text/javascript">

    function modDisp() {
        var val = document.getElementById("filsor").value;
        window.location.href = "cscMain.php?order=" + val;


    }

    $(".filter-class").click(function () {
            var reff = $(this).text().split(".")[0].replace(/\s/g, '');
            var redirect = "https://catalog.utdallas.edu/2019/graduate/courses/" + reff.toLowerCase();
            window.open(redirect, '_blank');
        }
    );


</script>
</html>