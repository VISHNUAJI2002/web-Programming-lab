<html> 
<head> 
 <title>Electricity Bill Calculator</title> 
 <style> 
 .error {  
 color: blue;  
 } 
 table {  
 margin: 0 auto;  
 border-collapse: collapse;  
 width: 50%;  
 } 
 input {  
 width: 100%;  
 padding: 8px;  
 margin: 5px 0;  
 } 
 input[type="submit"] {  
 background-color:pink;  
 color: white;  
 border: none;  
 } 
 .result {  
 text-align: center;  
 margin-top: 20px;  
 font-size: 18px;  
 } 
 </style> 
</head> 
<body> 
<?php 
$nameErr = $unitsErr = ""; 
$name = $units = ""; 
$bill = 0; 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
 if (empty($_POST["name"])) { 
 $nameErr = "Name is required"; 
 } else { 
 $name = htmlspecialchars(trim($_POST["name"])); 
 } 
 if (empty($_POST["units"])) { 
 $unitsErr = "Units consumed is required"; 
 } elseif (!is_numeric($_POST["units"]) || $_POST["units"] < 0) { 
 $unitsErr = "Please enter a valid number of units";
 } else { 
 $units = (int)$_POST["units"]; 
 } 
 if (empty($nameErr) && empty($unitsErr)) { 
 if ($units <= 100) { 
 $bill = $units * 5; 
 } elseif ($units <= 200) { 
 $bill = (100 * 5) + (($units - 100) * 7.5); 
 } else { 
 $bill = (100 * 5) + (100 * 7.5) + (($units - 200) * 10);  } 
 } 
} 
?> 
<h2 style="text-align:center;">Electricity Bill Calculator</h2> <form method="post" action="" style="max-width: 400px; margin: auto;"> 
 <label for="name">Consumer Name:</label> 
 <input type="text" name="name" value="<?php echo $name; ?>">  <span class="error"><?php echo $nameErr; ?></span> 
 <label for="units">Units Consumed:</label> 
 <input type="number" name="units" value="<?php echo $units; ?>">  <span class="error"><?php echo $unitsErr; ?></span>   
 <input type="submit" value="Calculate Bill"> 
</form> 
<?php if ($bill > 0): ?> 
 <div class="result"> 
 <h3>Electricity Bill for <?php echo $name; ?>:</h3>  <p><strong>Units Consumed:</strong> <?php echo $units; ?></p>  <p><strong>Total Amount:</strong> Rs. <?php echo $bill; ?></p>  </div> 
<?php endif; ?> 
</body> 
</html> 
