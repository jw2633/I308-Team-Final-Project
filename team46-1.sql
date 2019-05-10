1A

SELECT CONCAT(s.lName, ', ', s.fName, ' ', s.mName) AS name, s.address as address, s.phone as phone, s.email as email
FROM student AS s, section AS sec, student_taking_class as stc
WHERE s.studentID = stc.studentID
AND sec.sectionID = stc.sectionID
AND sec.sectionID = '$sections';

2B

SELECT r.roomID, r.type, r.features
FROM room AS r, section AS s
WHERE r.roomID = s.roomID
AND r.features = '$feature'
AND '$time' NOT BETWEEN sTime AND eTime
Group by roomID;

3B

SELECT CONCAT(f.fName, ' ', f.mName, ' ', f.lName) AS name
FROM faculty AS f, section AS s, course AS c
WHERE f.facultyID = s.facultyID
AND s.courseID = c.courseID
AND c.number != '$course'
GROUP BY name;

6C

SELECT CONCAT(s.fName, '', s.mName, '', s.lName) AS name, CONCAT(f.fName, '', f.mName, '', f.lName) AS faculty
FROM student AS s, faculty AS f, section as sec, building as b, student_taking_class AS stc, room AS r
WHERE stc.studentID = s.studentID
AND stc.sectionID = sec.sectionID
AND stc.semesterID = sec.semesterID
AND stc.facultyID = f.facultyID
AND b.name = '$building'
AND '$time' BETWEEN sec.sTime AND sec.eTime
Group by name, faculty;

7A

SELECT CONCAT(s.fName, ' ', s.mName, ' ', s.lName) AS Name, m.name AS major
FROM student AS s, major AS m, advisor AS a
WHERE s.majorID = m.majorID
AND s.advisorID = a.advisorID
AND CONCAT(a.fName, ' ', a.mName, ' ', a.lName) = '$advisor'
ORDER BY Name;

8B

SELECT CONCAT(s.fName, ' ', s.lName) AS name, s.parent_phone AS phone
FROM student as s,  student_taking_class as stc,  semester as sem 
WHERE s.studentID = stc.studentID   
AND stc.semesterID = sem.semesterID  
AND NOT sem.title = 'FALL2019'   
AND NOT sem.title = 'SUMMER2019'
GROUP BY name 
ORDER BY  name asc;


ADDITIONAL QUERIES:

Produce a list of student names that were taking a class during the selected year.

SELECT CONCAT(s.fName,' ', s.mName, ' ', s.lName) as name  
FROM student as s, student_taking_class as stc, semester as sem 
WHERE s.studentID = stc.studentID 
AND stc.semesterID = sem.semesterID 
AND sem.year = '$year' 
GROUP BY name;

Produce a list of the building names that have the selected room and can hold more than the selected capacity.

SELECT b.name as name
FROM building as b, room as r 
WHERE b.buildingID = r.buildingID 
AND r.type='$room' 
AND r.capacity >= '$capacity' 
GROUP BY name
