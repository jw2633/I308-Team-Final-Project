<?php
// Create connection
$conn = mysqli_connect("db.soic.indiana.edu","i308s18_team46","my+sql=i308s18_team46","i308s18_team46");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Grab Roles
$year = mysqli_real_escape_string($conn, $_POST['year']);
$sql = "SELECT CONCAT(s.fName,' ', s.mName, ' ', s.lName) as name  
FROM student as s, student_taking_class as stc, semester as sem 
WHERE s.studentID = stc.studentID 
AND stc.semesterID = sem.semesterID 
AND sem.year = '$year' 
GROUP BY name";

$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);

// Print Table
if ($result->num_rows > 0) {
    echo "<table>";
	echo "<tr><th>Name</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["name"]."</td></tr>";
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
