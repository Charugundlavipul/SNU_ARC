<?php include_once("header.php") ?>
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
    // include header.php file
	include ('config.php');

	error_reporting(0);

	if (isset($_POST['submit'])) {

		$var = $_POST['title'];
		$amount = $_POST['amount'];
		$description = $_POST['reason'];
		$id=$_SESSION['id'];
		//  echo '<script type="text/javascript">alert("'.$id.'");</script>';
	
		
			$sql = "SELECT * FROM users WHERE id='$id' AND user_status = 'unblocked'";
			$result = mysqli_query($conn, $sql);
			if ($result->num_rows > 0) {

				$user_id = $_SESSION['id'];

				$query = "SELECT * FROM users WHERE id = '$user_id'";
				$result = mysqli_query($conn, $query);
				$result = mysqli_fetch_assoc($result);
			
				$limit = $result['user_limit'];
				$due = $result['user_due'];
			
				$finallimit = $limit - $amount;
				$finaldue = $due + $amount;				

				$query = "UPDATE users SET user_due = '$finaldue', user_limit = '$finallimit' WHERE id = '$user_id'";
				$result = mysqli_query($conn, $query);

				$query = "SELECT * FROM shops WHERE shop_name = '$var'";
				$result = mysqli_query($conn, $query);
				$result = mysqli_fetch_assoc($result);
		
				$wallet = $result['shop_wallet'];
				$finalwallet = $wallet + $amount;
		
				$query = "UPDATE shops SET shop_wallet = '$finalwallet' WHERE shop_name = '$var'";
				$result = mysqli_query($conn, $query);								

				$sql = "INSERT INTO payments (user_id, seller_id,amount,reason)
						VALUES ('$id', '$var', '$amount', '$description')";
				$result = mysqli_query($conn, $sql);
				if ($result) {
					echo "<script>alert('Wow! Payment Successful')</script>";
					$var = "";
					$amount = "";
					$phonenumber="";
					
					header("Location: index.php");
				} else {
					echo "<script>alert('Woops! Something Wrong Went.')</script>";
				}
			} else {
				echo "<script>alert('You are Blocked, Clear due to get unblocked')</script>";
			}
			
		
	}

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
							<!-- <?php echo $_SESSION['id'];?> -->
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
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>SNU ARC</p>
						<h1>Payment</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<br>
	<br>
	<?php if(isset($_SESSION['id'])){ ?>
	<div class="box_center" style="margin-top: 5%">			
		<div class="card single-accordion"  id = "paymentdiv">
						

						    <!-- <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample"> -->
						      <div class="pb-0" style="padding: 20px 40px">
						        <div class="billing-address-form">
						        	<form action="" method="post">
										<br>
										<p class="row" style="text-align: left; margin-bottom: 30px">
											<label for="ShopName" class="col-lg-4" style="color: white; font-size:25px; font-weight: bold">Shop Name:</label>
											<select class="col-lg-8" name="title" id="inputGroupSelect02" style="border-radius:3px; border: 1px solid #F28123">
								<!-- <option  selected><?php echo $var;?></option> -->
												<?php 
													// use a while loop to fetch data 
													// from the $all_categories variable 
													// and individually display as an option
													$sql = "SELECT * FROM `shops`";
													$all_categories = mysqli_query($conn,$sql);
													while ($category = mysqli_fetch_array(
													$all_categories,MYSQLI_ASSOC)):; 
													?>
													<option value="<?php echo $category["shop_name"];
													// The value we usually set is the primary key
													?>"> 
													<?php echo $category["shop_name"];
													// To show the category name to the user
													?>
													</option>
													<?php 
													endwhile; 
						// While loop must be terminated
												?>
											</select>
										</p>	
										<p class="row" style="text-align: left">
											<label for="amount" class="col-lg-4" style="color: #F28123; font-size:25px; font-weight: bold">Amount:</label>
											<input class="col-lg-8" type="number" placeholder="Amount" name="amount" value="<?php echo $amount; ?>" required>
										</p>
										<p class="row" style="text-align: left">
											<label for="Reason" class="col-lg-4" style="color: white; font-size:25px; font-weight: bold">Reason:</label>
											<input class="col-lg-8" type="text" placeholder="Reason" name="reason" value="<?php echo $reason; ?>" required>
										</p>
										<div class="button_container">
										<div class="signin_btn">
										<button name="submit" class="boxed-btn">Pay</button><br>			
										</div>
									</form>
						        </div>
						      </div>
						    <!-- </div> -->
							
							

							</form>
							</div>
							<!-- <div class="cl1">
								<div class="cl2">
							<a href="register.php" class="breadcrumbb-text" ><p style="font-size: large;">Register </p></a>&nbsp;<p style="color:black; font-size:large;"><b>If you don't have an account</b></p></div></div> -->
		</div>
       
	</div>
	<?php }else{ ?>
        <div class="card-body text-center" style="margin: 300px 300px">
            <h1>Login to Access</h1>
        </div>
    <?php } ?>

	<br>
	<br>
	<br>
	<br>
	<br>
</body>
<?php include_once("footer.php") ?>
