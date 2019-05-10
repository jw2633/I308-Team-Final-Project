<?php
// Create connection
$conn = mysqli_connect("db.soic.indiana.edu","i308s18_team46","my+sql=i308s18_team46","i308s18_team46");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Grab Roles
$advisor = mysqli_real_escape_string($conn, $_POST['advisor']);
$sql = "SELECT CONCAT(s.fName, ' ', s.mName, ' ', s.lName) AS Name, m.name AS major
FROM student AS s, major AS m, advisor AS a
WHERE s.majorID = m.majorID
AND s.advisorID = a.advisorID
AND CONCAT(a.fName, ' ', a.mName, ' ', a.lName) = '$advisor'
ORDER BY Name";

$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);

// Print Table
if ($result->num_rows > 0) {
    echo "<table>";
	echo "<tr><th>Name</th><th>Major</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Name"]."</td><td>".$row["major"]."</td></tr>";
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
