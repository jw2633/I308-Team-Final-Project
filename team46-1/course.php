<?php
// Create connection
$conn = mysqli_connect("db.soic.indiana.edu","i308s18_team46","my+sql=i308s18_team46","i308s18_team46");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Grab Roles
$course = mysqli_real_escape_string($conn, $_POST['course']);
$sql = "SELECT CONCAT(f.fName, ' ', f.mName, ' ', f.lName) AS name
FROM faculty AS f, section AS s, course AS c
WHERE f.facultyID = s.facultyID
AND s.courseID = c.courseID
AND c.number != '$course'
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