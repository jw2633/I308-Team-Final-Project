<?php
// Create connection
$conn = mysqli_connect("db.soic.indiana.edu","i308s18_team46","my+sql=i308s18_team46","i308s18_team46");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Grab Roles
$feature = mysqli_real_escape_string($conn, $_POST['feature']);
$time = mysqli_real_escape_string($conn, $_POST['time']);
$sql = "SELECT r.roomID, r.type, r.features
FROM room AS r, section AS s
WHERE r.roomID = s.roomID
AND r.features = '$feature'
AND '$time' NOT BETWEEN sTime AND eTime
Group by roomID";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);

// Print Table
if ($result->num_rows > 0) {
    echo "<table>";
	echo "<tr><th>Room ID</th><th>Type</th><th>Feature</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["roomID"]."</td><td>".$row["type"]."</td><td>".$row["features"]."</td></tr>";
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
