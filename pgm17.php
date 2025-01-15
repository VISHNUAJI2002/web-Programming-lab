<?php 
// Database connection settings 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "mca"; 
//Creating connection 
$conn = new mysqli($servername, $username, $password, $database); //Connection check 
if ($conn->connect_error) { 
die("Connection failed: " . $conn->connect_error); 
} 
//SQL query 
$sql = "SELECT `Reg.No`, `Name`, `E-mail`, `Age`, `Gender` FROM student"; $result = $conn->query($sql); 
?> 
<!--Table--> 
<!DOCTYPE html> 
<html> 
<head> 
<title>WPL PRG 17</title> 
</head> 
<body> 
<h2>Student Details</h2> 
<table> 
<table border="1"> 
<tr> 
<th>Reg.No</th> 
<th>Name</th> 
<th>E-mail</th> 
<th>Age</th> 
<th>Gender</th> 
</tr> 
<?php 
//Fetch and display data in table rows 
if ($result->num_rows > 0) { 
while($row = $result->fetch_assoc()) { 
echo "<tr>
<td>" . $row["Reg.No"] . "</td> 
<td>" . $row["Name"] . "</td> 
<td>" . $row["E-mail"] . "</td> 
<td>" . $row["Age"] . "</td> 
<td>" . $row["Gender"] . "</td> 
</tr>"; 
} 
} 
else { 
echo "<tr><td colspan='5'>No records found</td></tr>"; } 
// Close the connection 
$conn->close(); 
?> 
</table> 
</body> 
</html> 
