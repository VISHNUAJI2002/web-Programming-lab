Book.php 
<html> 
<head> 
<title>Book</title> 
</head> 
<body> 
<center> 
<h3>Enter book details</h3> 
<table> 
<form name="bookform" action="details.php" method="post"> 
<tr> 
<td>Book_Id :</td> 
<td><input type="text" name="bookid"></td> 
</tr> 
<tr> 
<td>Title :</td> 
<td><input type="text" name="title"></td> 
</tr> 
<tr> 
<td>Author :</td> 
<td><input type="text" name="author"></td> 
</tr> 
<tr> 
<td>Edition :</td> 
<td><input type="text" name="edition"></td> 
</tr> 
<tr> 
<td>Publisher :</td>
<td><input type="text" name="publisher"></td> 
</tr> 
<tr> 
<th colspan=2><input type="submit" name="submit" value="Submit"></th> </tr> 
</form> 
</table> 
<h3>Search Book</h3> 
<form name="search_form" action="details.php" method="post"> Author: <input type="text" name="author"> 
<input type="submit" name="search" value="Search"> 
</form> 
</center> 
</body> 
</html> 
details.php 
<html> 
<body> 
<center> 
<h1>Book Details</h1> 
<table border="1"> 
<tr> 
<th>Book Id</th> 
<th>Title</th> 
<th>Author</th> 
<th>Edition</th> 
<th>Publisher</th> 
</tr> 
<?php 
$conn = mysqli_connect("localhost", "root", "", "books");
if (!$conn) { 
die("Connection failed: " . mysqli_connect_error()); 
} 
if (isset($_POST['submit'])) { 
$bookid = $_POST['bookid']; 
$title = $_POST['title']; 
$author = $_POST['author']; 
$edition = $_POST['edition']; 
$publisher = $_POST['publisher']; 
$sql = "INSERT INTO details VALUES('$bookid', '$title', '$author', '$edition', '$publisher')"; if (mysqli_query($conn, $sql)) { 
echo "<br>New record created successfully"; 
} else { 
echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
} 
} 
if (isset($_POST['search'])) { 
$author = $_POST['author']; 
$sql = "SELECT * FROM details WHERE Author='$author'"; 
$res = mysqli_query($conn, $sql); 
$totRows = mysqli_num_rows($res); 
if ($totRows == 0) { 
echo "<tr><td colspan='5'>No records found!</td></tr>"; 
} else { 
while ($row = mysqli_fetch_assoc($res)) { 
echo "<tr>"; 
echo "<td>" . $row["Book_Id"] . "</td>"; 
echo "<td>" . $row["Title"] . "</td>"; 
echo "<td>" . $row["Author"] . "</td>"; 
echo "<td>" . $row["Edition"] . "</td>"; 
echo "<td>" . $row["Publisher"] . "</td>";
echo "</tr>"; 
} 
} 
} else { 
$sql = "SELECT * FROM details"; 
$result = mysqli_query($conn, $sql); 
if (mysqli_num_rows($result) > 0) { 
while ($row = mysqli_fetch_assoc($result)) { 
echo "<tr>"; 
echo "<td>" . $row["Book_Id"] . "</td>"; 
echo "<td>" . $row["Title"] . "</td>"; 
echo "<td>" . $row["Author"] . "</td>"; 
echo "<td>" . $row["Edition"] . "</td>"; 
echo "<td>" . $row["Publisher"] . "</td>"; 
echo "</tr>"; 
} 
} else { 
echo "<tr><td colspan='5'>No records found</td></tr>"; } 
} 
mysqli_close($conn); 
?> 
</table> 
</center> 
</body> 
</html>

















