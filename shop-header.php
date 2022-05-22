<?php session_start();?>
<?php 
if (!isset($_SESSION['username'])&& isset($_SESSION['id'])&& isset($_SESSION['wallet'])) {
    header("Location: shop-index.php");
}
include 'config.php';

?>
<?php
if (isset($_POST['wallet_submit'])) {
   
	$wallet = $_POST['wallet'];
    $id=$_SESSION['id'];
    $prevwallet=$_SESSION['wallet'];
    $total=$wallet+$prevwallet;
	$name=$_SESSION['username'];

	$sql = "UPDATE shops SET shop_wallet = '$total' WHERE shops.shop_name = '$name'";
	$result = mysqli_query($conn, $sql);
    $_SESSION['wallet']=$total;
     $wallet="";
    
	
	// 	$row = mysqli_fetch_assoc($result);
}	
?>
<?php
if (isset($_POST['wallet_withdraw'])) {
   
	$wallet = $_POST['wallet'];
    $id=$_SESSION['id'];
    $prevwallet=$_SESSION['wallet'];
    $total=$prevwallet-$wallet;
	$name=$_SESSION['username'];
	if($total>=0){

	$sql = "UPDATE shops SET shop_wallet = '$total' WHERE shops.shop_name = '$name'";
	$result = mysqli_query($conn, $sql);
    $_SESSION['wallet']=$total;
     $wallet="";
    }
    else{
        echo "<script>alert('Insufficient Funds')</script>";
    }
	
	// 	$row = mysqli_fetch_assoc($result);
}
?>
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
							<a href="shop-index.php">
							<img src="assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="shop-index.php">Transactions</a>
								</li>
								<!-- <li><a href="about.php">About</a></li> -->
								<!-- <li><a href="#">Pages</a> -->
									<!-- <ul class="sub-menu"> -->
										<!-- <li><a href="404.php">404 page</a></li> -->
										<!-- <li><a href="about.php">About</a></li> -->
										<!-- <li><a href="gatepass.php">gatepass</a></li>
										<li><a href="paylater.php">paylater</a></li> -->
										<!-- <li><a href="contact.php">Contact</a></li>
										<li><a href="news.php">News</a></li>
										<li><a href="shop.php">Shop</a></li> -->
										<!-- <li><a href="payment.php">Payment</a></li> -->
									<!-- </ul> -->
								<!-- </li> -->
								<!-- <li><a href="news.php">News</a> -->
									<!-- <ul class="sub-menu">
										<li><a href="news.php">News</a></li>
										<li><a href="single-news.php">Single News</a></li>
									</ul>
								</li> -->
							<li>
								<?php if(!isset($_SESSION['id'])){ ?>
										<a href="#">wallet</a>
									<?php }else{ ?>

											<li> <a style="cursor: pointer;" class="nav-link" data-toggle="modal" data-target="#exampleModal">Wallet</a></li>
											
									
									<?php } ?>


							</li>

							<li>
								<?php if(!isset($_SESSION['id'])){ ?>
										<a href="#">Profile</a>
									<?php }else{ ?>

										<li><a href="shop-profile.php">Check Profile</a></li>
											
									
									<?php } ?>


							</li>
								<li>
									<?php if(!isset($_SESSION['id'])){ ?>
										<a href="shop-login.php">Login/Register</a>
									<?php }else{ ?>
										<a href="shop-profile.php"><i class="fas fa-user mr-2"></i><?php echo $_SESSION['username']; ?></a>
										<ul class="sub-menu">
											<li><a href="shop-profile.php">Check Profile</a></li>
											<li><a href="shop-logout.php">Logout</a></li>
											<li> <a style="cursor: pointer;" class="nav-link" data-toggle="modal" data-target="#exampleModal">Wallet</a></li>
											
										</ul>
									<?php } ?>
								</li>
								<!-- <li>
									<div class="header-icons">
										<a class="shopping-cart" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									</div>
								</li> -->
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
  <div class="col-md-4">Wallet Balance is: </div>
  <div class="col-md-5"><h5 class="font-baloo font-size-20"><span class="text-danger header-wallet-price" id="deal-price"><?php echo $_SESSION['wallet']; ?></span></h5> </div>
</div>
    <br>
    
    <form action="" method="POST" class="login-email">
    <div class="input-group mb-3">
  <input type="number" class="form-control" placeholder="Enter Number" name="wallet" value="<?php echo $wallet; ?>" required>
  <!-- <button class="btn btn-outline-secondary" name="wallet_submit" type="submit" id="button-addon2" >Button</button> -->
  </div> 
 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name ="wallet_submit" class="btn btn-primary">Add Balance</button>
        <button type="submit" name ="wallet_withdraw" class="btn btn-primary">Withdraw</button>
        <!-- class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#addsuccess" -->
      </div>
      </form>
    </div>
  </div>
</div>
    <!-- !Primary Navigation -->
    <!-- <div class="modal fade" id="addsuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Wallet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          Balance Added Succesfully
          <br>
    <div class="row">
  <div class="col-md-4">Wallet Balance is: </div>
  <div class="col-md-5"><h5 class="font-baloo font-size-20"><span class="text-danger" id="deal-price"><?php echo $_SESSION['wallet']; ?></span></h5> </div>
</div>
    <br>    
    <form action="" method="POST" class="login-email">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>      
      </div>
      </form>
    </div>
  </div>
</div> -->
<!-- <div class="modal fade" id="withdrawsuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Wallet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          Withdraw Succesfully
          <br>
          <br>
    <div class="row">
  <div class="col-md-4">Wallet Balance is: </div>
  <div class="col-md-5"><h5 class="font-baloo font-size-20"><span class="text-danger" id="deal-price"><?php echo $_SESSION['wallet']; ?></span></h5> </div>
	</div>
    <br>    
    <form action="" method="POST" class="login-email">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>      
      </div>
      </form>
    </div>
  </div>
</div> -->