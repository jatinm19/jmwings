<?php
session_start();
require 'config.php';

if(!isset($_SESSION['cust_id']))								
{
	$_SESSION['msg']="<h2 style='color:red;text-align:center;'>You need to login first</h2>";
		header("Location:loginform.php");
		exit;
}
	$count=0;
		$count1=0;
	$custid=$_SESSION['cust_id'];
	$total_price=0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>jmwings</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/jm.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
<!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@600&display=swap" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
</head>
<body class="animsition">
	
	<<!-- Header -->
	<header class="header-v3">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<div class="wrap-menu-desktop" style="height:auto;background-color:black;">
				<nav class="limiter-menu-desktop p-l-45">
				
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">jmwings</a>
					
					
					  <nav class="limiter-menu-desktop p-l-45 topnavbar" >
                    
                    <!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Home</a>
							</li>

                            <li>
                                <a href="productWomen.php">Women</a>
                            </li>

                            <li>
                                <a href="productMen.php">Men</a>
                            </li>
							
							<li>
								<a href="productAccessories.php">Accessories</a>
							</li>

                            <li>
                                <a href="blog.php">Inside Stories</a>
                            </li>

                            <li>
                                <a href="about.php">About Us</a>
                            </li>

                            <li>
                                <a href="contact.php">Contact Us</a>
                            </li>

						</ul>
					</div>	
				</nav>
				
					                              
					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m h-full">							
						<div class="flex-c-m h-full p-r-25 bor6">
                            
                      <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>
						
						
                            
                            <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-1 user-dropdown">
                                <button class="user">
									<i class="fas fa-user-circle"></i>
								</button>
								<?php 
								if(!isset($_SESSION['cust_id']))
								{ ?>
									<div class="user-dropdown-content">
									  <a href="loginform.php">Login</a>
									  <a href="signupform.php">Register</a>
									</div>
								<?php 
								}
								else
								{
										
							
								?>
									<div class="user-dropdown-content">
									  <a href="myaccount.php">My Account</a>
									  <a href="myorders.php">My Orders</a>
									  <a href="logout.php">Logout</a>
									</div>
								<?php 
								}
								?>
								
                            </div>
							
							<?php
													
							$sql5='select * from xpmp_customer_wishlist where customer_id='.$custid;
						
							$rs5 = mysqli_query($conn,$sql5);
							if (mysqli_num_rows($rs5) > 0) 
							{
								$count=0;
								while($row5 = mysqli_fetch_assoc($rs5)) 
								{
									$count++;
								}
							}
							?>
							
							<a href="wishlist.php" class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti" data-notify="<?php echo $count; ?>" >
								<i class="zmdi zmdi-favorite-outline"></i>
							</a>
							<?php
																
								$sql6='select * from xpmp_cart where customer_id='.$custid;
							
								$rs6 = mysqli_query($conn,$sql6);
								if (mysqli_num_rows($rs6) > 0) 
								{
									$count1=0;
									while($row6 = mysqli_fetch_assoc($rs6)) 
									{
										$count1++;
									}
								}
							?>
                            
							<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php echo $count1; ?>" >
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
							
						</div>
					</div>
                    </nav>
                
              
		</div>
		</div>


		<!-- Header Mobile -->
		<div class="wrap-header-mobile" style="background-color:black;">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php" style="color:lightgray;">jmwings</a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
			
				<div class="icon-header-item cl2 hov-cl1 trans-04 js-show-modal-search">
					<i class="zmdi zmdi-search" style="color:lightgray"></i>
				</div>
				
				<?php
													
							$sql5='select * from xpmp_customer_wishlist where customer_id='.$custid;
						
							$rs5 = mysqli_query($conn,$sql5);
							if (mysqli_num_rows($rs5) > 0) 
							{
								$count=0;
								while($row5 = mysqli_fetch_assoc($rs5)) 
								{
									$count++;
								}
							}
				?>
				<a href="wishlist.php" class="dis-block icon-header-item cl2 hov-cl1 trans-04 icon-header-noti" data-notify="<?php echo $count; ?>" >
					<i class="zmdi zmdi-favorite-outline" style="color:lightgray"></i>
				</a>
				<?php
																
								$sql6='select * from xpmp_cart where customer_id='.$custid;
							
								$rs6 = mysqli_query($conn,$sql6);
								if (mysqli_num_rows($rs6) > 0) 
								{
									$count1=0;
									while($row6 = mysqli_fetch_assoc($rs6)) 
									{
										$count1++;
									}
								}
							?>
				
				<div class="icon-header-item cl2 hov-cl1 trans-04  icon-header-noti js-show-cart" data-notify="<?php echo $count1; ?>">
					<i class="zmdi zmdi-shopping-cart" style="color:lightgray"></i>
				</div>
							
				
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze" style="background-color:lightgray;">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
			
			<?php 
				if(!isset($_SESSION['cust_id']))
				{ ?>
			
				<li>
					<a href="loginform.php">Login</a>
				</li>
				<?php 
				}
				else
				{ ?>
				
				<li>
					<a href="myaccount.php">My Account</a>
				</li>
				
				<?php 
					}
					?>
					
				<li>
					<a href="index.php">Home</a>
				</li>

				<li>
					<a href="productWomen.php">Women</a>
				</li>

				<li>
					<a href="productMen.php">Men</a>
				</li>
				
				<li>
					<a href="productAccessories.php">Accessories</a>
				</li>

				<li>
					<a href="blog.php">Inside Stories</a>
				</li>

				<li>
					<a href="about.php">About Us</a>
				</li>

				<li>
					<a href="contact.php">Contact Us</a>
				</li>
				<?php 
				if(isset($_SESSION['cust_id']))
				{ ?>
				<li>
					<a href="logout.php">Logout</a>
				</li>
				<?php 
					}
					?>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<button class="flex-c-m btn-hide-modal-search trans-04">
				<i class="zmdi zmdi-close"></i>
			</button>

			<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="search" name="search-product" placeholder="Search">
					</div>	
		</div>
	</header>

 		<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
	
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
			<?php 
		if(!isset($_SESSION['cust_id']))
		{
			$_SESSION['msg']="<h2 style='color:red'>You need to login first</h2>";
			?>
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
				
				<div class="header-cart-content flex-w js-pscroll">
				<div class="cart-error" style="margin-top:100px;border:2px solid blue;">
				<h2>Oops...!!!</h2>
				<h4> You need to Login First.</h4>
				<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn1 p-lr-15 trans-04">
								<a href="loginform.php" style="color:white">Login</a>
							</button>
						</div>
						</div>
				</div>
				</div>
				</div>
				</div>
				<?php
		
		}
else{

	$custid=$_SESSION['cust_id'];

?>
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
				<?php
				$pia="SELECT * FROM xpmp_cart where customer_id=".$custid;
				$pib=mysqli_query($conn,$pia);
				 if (mysqli_num_rows($pib) > 0)
				 {
					 while($row = mysqli_fetch_assoc($pib))
					 {
						 $pid=$row["product_id"];
						 $pi1='select * from xpmp_product_description where product_id='.$pid;
						 $pi2='select * from xpmp_product where product_id='.$pid;
						 $pi1=mysqli_query($conn,$pi1);
							 $pi2=mysqli_query($conn,$pi2);
						 if(mysqli_num_rows($pi1) > 0)
						 {
							 if(mysqli_num_rows($pi2) > 0)
							 {
								 while($row1 = mysqli_fetch_assoc($pi1))
								 {
									 while($row2 = mysqli_fetch_assoc($pi2))
									 {
								 ?>
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/gallery-08.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								<?php echo $row1["name"]; ?>
							</a>

							<span class="header-cart-item-info">
								<?php echo $row2["price"]; ?>
							</span>
						</div>
					</li>
					<?php
				$total_price=$total_price+ $row2["price"];
				?>
					<?php 
						}
						 }
						 }}
						 }}
						 ?>
</ul>
					
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total:<?php echo $total_price.'  INR'; ?>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg m-t-50">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Wishlist
			</span>
		</div>
	</div>
		
	<!-- Wishlist -->
	<form class="bg0 p-t-100 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xl-10 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-wishlist">
							<table class="table-wishlist">
								<tr class="table_head">
								 
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Add To Cart</th>
									<th class="column-6">Remove</th>
								</tr>
								
								<?php

									$sql1='select * from xpmp_customer_wishlist where customer_id='.$custid;
								
									$rs1 = mysqli_query($conn,$sql1);
							
									if (mysqli_num_rows($rs1) > 0) 
									{
									
									while($row1 = mysqli_fetch_assoc($rs1)) 
									{
										$p_id=$row1['product_id'];
										
										$sql2='select * from xpmp_product_description where product_id='.$p_id;
										$sql3='select * from xpmp_product where product_id='.$p_id;
										
										$rs2=mysqli_query($conn,$sql2);
										$rs3=mysqli_query($conn,$sql3);
										if(mysqli_num_rows($rs2)>0)
										{ 
											if(mysqli_num_rows($rs3)>0)
												{ 	
													while($row2=mysqli_fetch_assoc($rs2))
													{
														while($row=mysqli_fetch_assoc($rs3))
														{
								
								 ?>

								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="images/item-cart-04.jpg" alt="IMG">
										</div>
									</td>
									<td class="column-2 js-name-detail"><?php echo $row2["name"]; ?></td>
									<td class="column-3">Rs <?php echo $row["price"]; ?></td>
									<td class="column-4">1
									</td>
									<td class="column-5">
										<div class="size-204 flex-w flex-m respon6-next">
											<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-10 trans-04 js-addcart-detail" id="<?php echo $p_id; ?>" onClick="reply_click2(this.id)">
												Add to cart
											</button>
										</div>
									</td>
									
									<td class="column-6">
										<div class="size-204 flex-w flex-m respon6-next">
											<button class="btn cl8 hov-btn3 trans-04 js-removecart-detail" id="<?php echo $p_id; ?>" onClick="reply_click3(this.id)">
												<i class="fas fa-window-close" title="Remove this product"></i>
											</button>
										</div>
									</td>
								</tr>
								<?php
										}}
								}}}}
								else{
									echo "<h3 style='color:red;text-align:center;padding-bottom:30px;'>Your Wishlist is empty</h3>";
								}
								?>
								</table>
						</div>
						</div></div></div></div>
						</form>
						
						
<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">

				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Need Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="contact.php" class="stext-107 cl7 hov-cl1 trans-04">
								Contact Us
							</a>
						</li>

						<li class="p-b-10">
							<a href="return.php" class="stext-107 cl7 hov-cl1 trans-04">
								Returns &amp Exchange Policy 
							</a>
						</li>

						<li class="p-b-10">
							<a href="product-care.php" class="stext-107 cl7 hov-cl1 trans-04">
								Product Care
							</a>
						</li>

						<li class="p-b-10">
							<a href="faq.php" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						The Company
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="about.php" class="stext-107 cl7 hov-cl1 trans-04">
								About jmwings
							</a>
						</li>

						<li class="p-b-10">
							<a href="career.php" class="stext-107 cl7 hov-cl1 trans-04">
								Career with us
							</a>
						</li>

						<li class="p-b-10">
							<a href="terms-and-conditions.php" class="stext-107 cl7 hov-cl1 trans-04">
								Terms &amp Conditions
							</a>
						</li>

					<div class="p-t-27">
					<h4 class="stext-301 cl0 p-b-30">
						Find Us On
					</h4>
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fab fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fab fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fab fa-twitter"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Feedback
					</h4>

					<form method="post">
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="name" placeholder="Your Name">
							<div class="focus-input1 trans-04"></div>
						</div>
						<br>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="Your Email">
							<div class="focus-input1 trans-04"></div>
						</div>
						<br>
						<div class="wrap-input1 w-full p-b-4">
						<textarea class="input1 bg-none plh1 stext-107 cl7"  rows = "3" cols = "30" name = "feedback" placeholder="Your Feedback Here"></textarea>
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04" type="submit" name="add">
								Submit
							</button>
						</div>
					</form>
				</div>
			</div>
			<?php 
			if(isset($_POST['add']))
			{
				$a=$_POST['name'];
				$b=$_POST['email'];
				$c=$_POST['feedback'];
				$e="INSERT INTO xpmp_footer_feedback(name,email,feedback) VALUES('$a','$b','$c')";
				$rs=mysqli_query($conn,$e);
		
			}
			?>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>
				<hr>
				<p class="stext-107 cl6 txt-center">

				jmwings &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved.<br>
	
			</div>
		</div>
	</footer>
	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>



<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
		
		$('.js-removecart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is removed from wishlist !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<!--================================================================================================-->

<script type="text/javascript">
	
	function reply_click2(clicked_id)
	  {
		var p2= clicked_id;
		var data = 'q='+ p2;
		 $.ajax({
			type: "GET",
			url: "addtocart.php",
			data: data,
			dataType: "html",
		});
	  }
</script>

<script type="text/javascript">
	
	function reply_click3(clicked_id)
	  {
		var p3 = clicked_id;
		var data = 'q='+ p3;
		 $.ajax({
			type: "GET",
			url: "removefromwishlist.php",
			data: data,
			dataType: "html",
		});
	  }
</script>


</body>
</html>
