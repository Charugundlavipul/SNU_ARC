<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: admin-index.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	// echo $email;
	// echo $password;


	$sql = "SELECT * FROM admin WHERE admin_email='$email' AND admin_password='$password'";
	$result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_assoc($result);
    // $_SESSION['id']=$row['sec_id'];
    // header("Location: shop-index.php")	;
    // echo "session".$_SESSION['id']." ".mysqli_num_rows($result) ;

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['admin_name'];
		$_SESSION['password']=$row['admin_password'];	
		$_SESSION['id']=$row['admin_id'];	
		$_SESSION['email'] = $row['admin_email'];
		// $_SESSION['wallet']=$row['shop_wallet'];

		header("Location: admin-index.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
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
	<title>Login</title>

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
    <?php
    // require functions.php file
    require ('functions.php');
    ?>
</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<?php
    ob_start();
    // include header.php file
    include ('admin-header.php');
?>
	<!-- end header -->

	<!-- search area -->
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
	<!-- end search arewa -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumbb-section breadcrumb-bg ">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumbb-text">						
						<h1>Admin Sign In</h1>
					</div>
				</div>
			</div>
		</div>
        <div class="checkout-section mt-60 mb-50">
		<div class="container ">
			
				
				
	<div class="box_center">			
		<div class="card single-accordion">
						

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body pb-0">
						        <div class="billing-address-form">
						    <form action="admin-login.php" method="post">	
									<p><input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required></p>
						        	<p><input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required ></p>
						        </div>
						      </div>
						    </div>
							
							<div class="button_container">
							<div class="signin_btn">
        					<button name="submit" class="boxed-btn">Sign In</button><br>			
        					</div>

							</form>
							</div>
							<!-- <div class="cl1">
								<div class="cl2">
							<a href="shop-register.php" class="breadcrumbb-text" ><p style="font-size: large;">Register </p></a>&nbsp;<p style="color:black; font-size:large;"><b>If you don't have an account</b></p></div></div> -->
		</div>
       
	</div>
						  <!-- <div class="card single-accordion">
						    <div class="card-header" id="headingTwo">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          Shipping Address
						        </button>
						      </h5>
						    </div>
						    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="shipping-address-form">
						        	<p>Your shipping address form is here.</p>
						        </div>
						      </div>
						    </div>
						  </div> -->
						  <!-- <div class="card single-accordion">
						    <div class="card-header" id="headingThree">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          Card Details
						        </button>
						      </h5>
						    </div>
						    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="card-details">
						        	<p>Your card details goes here.</p>
						        </div>
						      </div>
						    </div>
						  </div> -->
						

				
				
			
		</div>
	</div>
	<!-- end check out section -->

	<!-- logo carousel -->

	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	
	<!-- end logo carousel -->

	<!-- footer -->
	

</body>
<?php include_once('footer.php') ?>
</html>