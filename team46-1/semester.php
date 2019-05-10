<?php
// Create connection
$conn = mysqli_connect("db.soic.indiana.edu","i308s18_team46","my+sql=i308s18_team46","i308s18_team46");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Grab Roles
$sql = "SELECT CONCAT(s.fName, ' ', s.lName) AS name, s.parent_phone AS phone
FROM student as s,  student_taking_class as stc,  semester as sem 
WHERE s.studentID = stc.studentID   
AND stc.semesterID = sem.semesterID  
AND NOT sem.title = 'FALL2019'   
AND NOT sem.title = 'SUMMER2019'
GROUP BY name 
ORDER BY  name asc";

$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);

// Print Table
if ($result->num_rows > 0) {
    echo "<table>";
	echo "<tr><th>Student Name</th><th>Parent Phone</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["name"]."</td><td>".$row["phone"]."</td></tr>";
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
