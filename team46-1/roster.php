<?php
// Create connection
$conn = mysqli_connect("db.soic.indiana.edu","i308s18_team46","my+sql=i308s18_team46","i308s18_team46");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Grab Roles
$sections = mysqli_real_escape_string($conn, $_POST['sections']);
$sql = "SELECT CONCAT(s.lName, ', ', s.fName, ' ', s.mName) AS name, s.address as address, s.phone as phone, s.email as email
FROM student AS s, section AS sec, student_taking_class as stc
WHERE s.studentID = stc.studentID
AND sec.sectionID = stc.sectionID
AND sec.sectionID = '$sections'";

$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);

// Print Table
if ($result->num_rows > 0) {
    echo "<table>";
	echo "<tr><th>Name</th><th>Address</th><th>Phone</th><th>Email</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["name"]."</td><td>".$row["address"]."</td><td>".$row["phone"]."</td><td>".$row["email"]."</td></tr>";
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
