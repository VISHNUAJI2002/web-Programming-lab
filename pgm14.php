<html> 
<head> 
<title>Indian Cricket Players</title> 
</head> 
<body> 
<?php 
$players = [ "Jayant Yadav","Krunal Panday", "Sachin Tendulkar", "Rohith Sharma", "Jasprit Bumrah"]; echo "<table border=1>"; 
echo "<tr><th>Names of Players</th></tr>"; 
foreach ($players as $player) { 
 echo "<tr><td>$player</td></tr>"; 
} 
echo "</table>"; 
?> 
</body> 
</html> 
