
<?php
session_start();
$q = intval($_GET['q']);

$con=mysqli_connect('localhost','root','','jmwings');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

$a = $_SESSION['cust_id'];


$sql="INSERT INTO xpmp_cart(customer_id,product_id,quantity) VALUES('$a','$q','1')";
$rs=mysqli_query($con,$sql);


mysqli_close($con);
?>
