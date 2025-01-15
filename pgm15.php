<html> 
<head> 
 <title> Registration Form</title> 
</head> 
<body> 
<style> 
 .error {  
 color:green;  
 } 
</style> 
<?php 
$nameErr = $emailErr = $passwordErr = $phoneErr = $dobErr = $genderErr = ""; $name = $email = $password = $phone = $dob = $gender = ""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
 if (empty($_POST["name"])) { 
 $nameErr = "Name is required"; 
 } else { 
 $name = htmlspecialchars($_POST["name"]); 
 } 
 if (empty($_POST["email"])) { 
 $emailErr = "Email is required"; 
 } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { 
 $emailErr = "Invalid email format"; 
 } else { 
 $email = htmlspecialchars($_POST["email"]); 
 } 
 if (empty($_POST["password"])) { 
 $passwordErr = "Password is required"; 
 } else { 
 if (strlen($_POST["password"]) < 6) { 
 $passwordErr = "Password must be at least 6 characters"; 
 } else { 
 $password = htmlspecialchars($_POST["password"]); 
 } 
 } 
 if (empty($_POST["phone"])) { 
 $phoneErr = "Phone number is required"; 
 } elseif (!preg_match("/^[0-9]{10}$/", $_POST["phone"])) { 
 $phoneErr = "Invalid phone number (must be 10 digits)"; 
 } else {
 $phone = htmlspecialchars($_POST["phone"]); 
 } 
 if (empty($_POST["dob"])) { 
 $dobErr = "Date of Birth is required"; 
 } else { 
 $dob = htmlspecialchars($_POST["dob"]); 
 } 
 if (empty($_POST["gender"])) { 
 $genderErr = "Gender is required"; 
 } else { 
 $gender = htmlspecialchars($_POST["gender"]); 
 } 
 if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($phoneErr) &&  empty($dobErr) && empty($genderErr)) { 
 echo "<p style='color: red; text-align: center;'>Registration successful!</p>";  } 
} 
?> 
<table align=center> 
<form method="post" action=""> 
 <tr> 
 <td><label>Name :</label></td> 
 <td><input type="text" name="name" value="<?php echo $name; ?>"></td>  <td><span class="error"><?php echo $nameErr; ?></span></td> 
 </tr> 
 <tr> 
 <td><label>Email :</label></td> 
 <td><input type="email" name="email" value="<?php echo $email; ?>"></td>  <td><span class="error"><?php echo $emailErr; ?></span></td> 
 </tr> 
 <tr> 
 <td><label>Password :</label></td> 
 <td><input type="password" name="password"></td> 
 <td><span class="error"><?php echo $passwordErr; ?></span></td> 
 </tr> 
 <tr> 
 <td><label>Phone :</label></td> 
 <td><input type="text" name="phone" value="<?php echo $phone; ?>"></td>  <td><span class="error"><?php echo $phoneErr; ?></span></td> 
 </tr> 
 <tr> 
 <td><label>Date of Birth :</label></td>
 <td><input type="date" name="dob" value="<?php echo $dob; ?>"></td>  <td><span class="error"><?php echo $dobErr; ?></span></td> 
 </tr> 
 <tr> 
 <td><label>Gender :</label></td> 
 <td> 
 <input type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo  "checked"; ?>> Male 
 <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo  "checked"; ?>> Female 
 </td> 
 <td><span class="error"><?php echo $genderErr; ?></span></td> 
 </tr> 
 <tr> 
 <td colspan="2" align="center"><input type="submit" value="SUBMIT"></td>  </tr> 
</form> 
</table> 
</body> 
</html> 
