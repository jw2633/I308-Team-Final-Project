<!doctype html>
<html>
<body>
<h1> Team 46 Final Project, Part Two</h1>
<h2>Selected Queries</h2>
<h3> 1A Produce a roster for a *specified section* sorted by student’s last name, first name
(5 points): </h3>
<form action="roster.php" method="POST">
Section: <select name='sections'>
<?php
$conn = mysqli_connect("db.soic.indiana.edu", "i308s18_team46", "my+sql=i308s18_team46", "i308s18_team46");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
	$result = mysqli_query($conn, "SELECT distinct sectionID FROM section");
	while ($row = mysqli_fetch_assoc($result)) {
		unset($id, $name);
		$id = $row['sectionID'];
		$name = $row['sectionID'];
		echo '<option value="'.$id.'">'.$name.'</option>';
	}
?>
	</select>
<input type="submit" name="submit" value="Find 1a">
</form>
<h3> 2B) Produce a list of rooms that are equipped with *some feature*—e.g., “wired instructor
station”—that are available at a particular time.(10 points): </h3>
<form action="feature.php" method="POST">
Feature: <select name='feature'>
<?php
$conn = mysqli_connect("db.soic.indiana.edu", "i308s18_team46", "my+sql=i308s18_team46", "i308s18_team46");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
	$result = mysqli_query($conn, "SELECT distinct features from room");
	while ($row = mysqli_fetch_assoc($result)) {
		unset($id, $name);
		$id = $row['features'];
		$name = $row['features'];
		echo '<option value="'.$id.'">'.$name.'</option>';
	}
?>
	</select>
Time: <input type="time" name="time">
<br>
<input type="submit" name="submit" value="Find 2b">
</form>
</br>
<h3> 3B) Produce a list of faculty who have never taught a *specified course*.
(10 points): </h3>
<form action="course.php" method="POST">
Course: <select name='course'>
<?php
$conn = mysqli_connect("db.soic.indiana.edu", "i308s18_team46", "my+sql=i308s18_team46", "i308s18_team46");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
	$result = mysqli_query($conn, "SELECT distinct number from course");
	while ($row = mysqli_fetch_assoc($result)) {
		unset($id, $name);
		$id = $row['number'];
		$name = $row['number'];
		echo '<option value="'.$id.'">'.$name.'</option>';
	}
?>
	</select>
<br>
<input type="submit" name="submit" value="Find 3b">
</form>
<br>
<h3> 8b) Produce an alphabetical list of students who have not attended during the two most
recent semesters along with their parents’ phone number.(10 points)</h3>
<form action="semester.php" method="POST">
<br>
<input type="submit" name="submit" value="Find 8b">
</form>
</br>
<h3> 6C) Produce a list of students and faculty who were in a *particular building* at a *particular
time*. Also include in the list faculty and advisors who have offices in that building.
(15 points): </h3>
<form action="building.php" method="POST">
Building: <select name='building'>
<?php
$conn = mysqli_connect("db.soic.indiana.edu", "i308s18_team46", "my+sql=i308s18_team46", "i308s18_team46");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
	$result = mysqli_query($conn, "SELECT distinct name from building");
	while ($row = mysqli_fetch_assoc($result)) {
		unset($id, $name);
		$id = $row['name'];
		$name = $row['name'];
		echo '<option value="'.$id.'">'.$name.'</option>';
	}
?>
	</select>
Time: <input type="time" name="time">
<br>
<input type="submit" name="submit" value="Find 6c">
</form>
</br>
<h3> 7A) Produce an alphabetical list of students with their majors who are advised by a
*specified advisor*.(5 points):</h3>
<form action="advisor.php" method="POST">
Advisor: <select name='advisor'>
<?php
$conn = mysqli_connect("db.soic.indiana.edu", "i308s18_team46", "my+sql=i308s18_team46", "i308s18_team46");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
	$result = mysqli_query($conn, "SELECT CONCAT(fname, ' ', mname, ' ', lname) AS name FROM advisor");
	while ($row = mysqli_fetch_assoc($result)) {
		unset($id, $name);
		$id = $row['name'];
		$name = $row['name'];
		echo "<option value='".$id."'>".$name."</option>";
	}
?>
	</select>
<br>
<input type="submit" name="submit" value="Find 7a">
</form>
</br>
<h2> Additional Queries </h2>
<h3> Produce a list of the building names that have the selected room and can hold more than the selected capacity.</h3>
<form action="add1.php" method="POST">
Room: <select name='room'>
<?php
$conn = mysqli_connect("db.soic.indiana.edu", "i308s18_team46", "my+sql=i308s18_team46", "i308s18_team46");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
	$result = mysqli_query($conn, "SELECT distinct type FROM room");
	while ($row = mysqli_fetch_assoc($result)) {
		unset($id, $name);
		$id = $row['type'];
		$name = $row['type'];
		echo "<option value='".$id."'>".$name."</option>";
	}
?>
	</select>
Capacity: <input type="number" name="capacity">
<br>
<input type="submit" name="submit" value="Find">
</form>
<br>
<h3> Produce a list of student names that were taking a class during the selected year.</h3>
<form action="add2.php" method="POST">
Year: <select name='year'>
<?php
$conn = mysqli_connect("db.soic.indiana.edu", "i308s18_team46", "my+sql=i308s18_team46", "i308s18_team46");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
	$result = mysqli_query($conn, "SELECT distinct year from semester");
	while ($row = mysqli_fetch_assoc($result)) {
		unset($id, $name);
		$id = $row['year'];
		$name = $row['year'];
		echo "<option value='".$id."'>".$name."</option>";
	}
?>
	</select>
<br>
<input type="submit" name="submit" value="Find">