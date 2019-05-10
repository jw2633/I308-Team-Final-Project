<?php
// Create connection
$conn = mysqli_connect("db.soic.indiana.edu","i308s18_team46","my+sql=i308s18_team46","i308s18_team46");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Grab Roles
$building = mysqli_real_escape_string($conn, $_POST['building']);
$time = mysqli_real_escape_string($conn, $_POST['time']);
$sql = "SELECT CONCAT(s.fName, '', s.mName, '', s.lName) AS name, CONCAT(f.fName, '', f.mName, '', f.lName) AS faculty
FROM student AS s, faculty AS f, section as sec, building as b, student_taking_class AS stc, room AS r
WHERE stc.studentID = s.studentID
AND stc.sectionID = sec.sectionID
AND stc.semesterID = sec.semesterID
AND stc.facultyID = f.facultyID
AND b.name = '$building'
AND '$time' BETWEEN sec.sTime AND sec.eTime
Group by name, faculty";

$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);

// Print Table
if ($result->num_rows > 0) {
    echo "<table>";
	echo "<tr><th>Student Name</th><th>Faculty Name</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["name"]."</td><td>".$row["faculty"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Print Num Rows
echo "$num_rows Rows\n";

// Close Connection
mysqli_close($conn);
?>