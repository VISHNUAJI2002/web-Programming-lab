<?php 
$students = ["Yadu", "Varada", "Alan", "Joel", "Vishnu"]; 
echo "Original Array:\n"; 
print_r($students); 
asort($students); 
echo "\nArray Sorted in Ascending Order (asort):\n"; 
print_r($students); 
arsort($students); 
echo "\nArray Sorted in Descending Order (arsort):\n"; 
print_r($students); 
?> 
