<?php
include("virtualtrader.class.php");
$virtualtrader = new VirtualTrader;
$con=mysqli_connect("localhost","root","Itsanew1","virtualtrader");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM tempque");

while($row = mysqli_fetch_array($result))
  {
	echo $row['code'];
	echo "  ";
	echo $row['quantity'];
	echo "  ";
	echo $row['username'];
	echo "  ";
	$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
	$virtualtrader->BuyShare($row['code'], (int)$row['quantity'], $row['username']);
  }
$delres = mysqli_query($con,"DELETE FROM tempque");
mysqli_close($con);
?>
