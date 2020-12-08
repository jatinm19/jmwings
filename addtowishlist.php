
<?php
session_start();
$q = intval($_GET['q']);
$con=mysqli_connect('localhost','root','','jmwings');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

$a = $_SESSION['cust_id'];

$sql5='select * from xpmp_customer_wishlist where customer_id='.$a;

$rs5 = mysqli_query($con,$sql5);
if (mysqli_num_rows($rs5) > 0) 
{	
	while($row2 = mysqli_fetch_assoc($rs5)) 
	{
		$selected_p = $row2['product_id'];
		if($selected_p == $q)
		{

			$sql="delete from xpmp_customer_wishlist where customer_id='$a' and product_id='$q'";
			if($rs=mysqli_query($con,$sql))
			{
				echo "success";
			}
			else
			{
				echo "error";
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
			}
		}
		else
		{
			$sql="INSERT INTO xpmp_customer_wishlist(customer_id,product_id) VALUES('$a','$q')";
			if(mysqli_query($con,$sql))
			{
				echo "s";
			}
		}
	}
}
else
{
	$sql="INSERT INTO xpmp_customer_wishlist(customer_id,product_id) VALUES('$a','$q')";
			if(mysqli_query($con,$sql))
			{
				echo "s";
				$sql6='select * from xpmp_customer_wishlist where customer_id='.$a;
			}
}

mysqli_close($con);
?>
