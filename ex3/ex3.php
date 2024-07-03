<?php

$connect=mysqli_connect("localhost","root","password1234","database1") or die("เกิดข้อผิดพลาด");

$sql = "SELECT * FROM information WHERE Country='Sweden'";
$result=mysqli_query($connect,$sql);

$row=mysqli_fetch_row($result);
echo "ID = ".$row[0]."<br>";
echo "CustomerName = ".$row[1]."<br>";
echo "ContactName = ".$row[2]."<br>";
echo "Address = ".$row[3]."<br>";
echo "City = ".$row[4]."<br>";
echo "PostalCode = ".$row[5]."<br>";
echo "Country = ".$row[6]."<br>";

?>