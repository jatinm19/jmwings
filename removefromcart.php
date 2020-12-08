
<?php
session_start();
$q = intval($_GET['q']);

$con=mysqli_connect('localhost','root','','jmwings');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

$a = $_SESSION['cust_id'];

$sql="delete from xpmp_cart where customer_id=".$a." and product_id=".$q;
if($rs=mysqli_query($con,$sql))
{
	echo "success";
}
else
{
	echo "error";
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

mysqli_close($con);
?>
