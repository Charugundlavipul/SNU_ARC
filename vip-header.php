<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>SNU ARC</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>
<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.php">
								<img src="assets/img/products/snuarclogo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="index.php">Home</a>
								</li>
								<li><a href="about.php">About</a></li>
								<li><a href="#">Pages</a>
									<ul class="sub-menu">
										<li><a href="404.php">404 page</a></li>
										<li><a href="duepayment.php">Clear Due</a></li>
										<li><a href="gatepass.php">gatepass</a></li>
										<li><a href="paylater.php">paylater</a></li>
										
										
										
										<li><a href="payment.php">Payment</a></li>
									</ul>
								</li>
								<li><a href="news.php">News</a>
									<ul class="sub-menu">
										<li><a href="news.php">News</a></li>
										<li><a href="single-news.php">Single News</a></li>
									</ul>
								</li>
								<li><a href="groundselection1.php">Grounds</a></li>
								<li> <a style="cursor: pointer;" class="nav-link" data-toggle="modal" data-target="#exampleModal">Wallet</a></li>
								<li><a href="roomselection.php">Rooms</a></li>
								<!-- <li><a href="shop.php">Shop</a>
									<ul class="sub-menu">
										<li><a href="shop.php">Shop</a></li>
										<li><a href="checkout.php">Check Out</a></li>
										<li><a href="single-product.php">Single Product</a></li>
										<li><a href="cart.php">Cart</a></li>
									</ul>
								</li> -->
								<li>
									<?php if(!isset($_SESSION['id'])){ ?>
										<a href="signin.php">Login/Register</a>
									<?php }else{ ?>
										<a href="profile.php"><i class="fas fa-user mr-2"></i><?php echo $_SESSION['username']; ?></a>
										<ul class="sub-menu">
											<li><a href="profile.php">Check Profile</a></li>
											<li><a href="logout.php">Logout</a></li>
										</ul>
									<?php } ?>
								</li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Wallet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <div class="row">
  <div class="col-md-4"><h6>Wallet Balance is:</h6> </div>
  <?php
  include 'config.php';
  $id=$_SESSION['id'];
  $sqlq="SELECT * FROM users WHERE id='$id'";
  $resultq = mysqli_query($conn, $sqlq);
  $rowq = mysqli_fetch_assoc($resultq);
  $_SESSION['wallet']=$rowq['user_limit'];
  ?>
  <div class="col-md-5"><h5 class="font-baloo font-size-20">₹<span class="orange-text header-wallet-price" id="deal-price"><?php echo $rowq['user_limit']; ?></span></h5> </div>
</div>
    <br>
    
    <form action="" method="POST" class="login-email">
    <div class="input-group mb-3">
  <!-- <input type="number" class="form-control" placeholder="Enter Number" name="wallet" value="<?php echo $wallet; ?>" required> -->
  <!-- <button class="btn btn-outline-secondary" name="wallet_submit" type="submit" id="button-addon2" >Button</button> -->
  </div> 
 

      </div>
      <div class="modal-footer">
	    <div class="signin_btn">
        	<button type="button" class="boxed-btn"data-dismiss="modal">Close</button><br>			
    	</div>
        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button> -->
     
        <!-- class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#addsuccess" -->
      </div>
      </form>
    </div>
  </div>
</div>