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

		$due = $_POST['due'];
		$amount = $_POST['amount'];
		
		$id=$_SESSION['id'];
		//  echo '<script type="text/javascript">alert("'.$id.'");</script>';
	
		
			$sql = "SELECT * FROM users WHERE id='$id'";
			$result = mysqli_query($conn, $sql);
			if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                if($row['user_due']<$amount){
                    echo "<script>alert('Woops! Amount Exceeded.')</script>";
                }
                else
                {
                $var=$row['user_due']-$amount;
                $var2=$row['user_limit']+$amount;
                $sql = "UPDATE users SET  user_due='$var' WHERE id='$id'";
                $result = mysqli_query($conn, $sql);
                $sql = "UPDATE users SET  user_limit='$var2' WHERE id='$id'";
			    $result = mysqli_query($conn, $sql);
                $sqlq="SELECT * FROM users WHERE id='$id'";
                $resultq = mysqli_query($conn, $sqlq);
                $rowq = mysqli_fetch_assoc($resultq);
                $_SESSION['wallet']=$rowq['user_limit'];
                }
				
				

			} else {
				echo "<script>alert('Something Went Wrong')</script>";
			}
            $sqlq="SELECT * FROM users WHERE id='$id'";
            $resultq = mysqli_query($conn, $sqlq);
            $rowq = mysqli_fetch_assoc($resultq);
		
	}

?>
	<!-- end header -->
    <?php include_once("header.php") ?>
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
						<h1>Due Payment</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<br>
	<br>

	<div class="box_center" style="margin-top: 5%">			
		<div class="card single-accordion"  id = "paymentdiv">
						

						    <!-- <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample"> -->
						      <div class="pb-0" style="padding: 20px 40px">
						        <div class="billing-address-form">
						        	<form action="" method="post">
										<br>
										<p class="row" style="text-align: left; margin-bottom: 30px">
											<label for="ShopName" class="col-lg-4" style="color: white; font-size:25px; font-weight: bold">User Name:</label>
                                            <input class="col-lg-8" type="text" placeholder="Amount" name="name" value="<?php echo $_SESSION["username"]; ?>" readonly>
										</p>	
                                        <?php
                                        include 'config.php';
                                        $id=$_SESSION['id'];
                                        $sqlq="SELECT * FROM users WHERE id='$id'";
                                        $resultq = mysqli_query($conn, $sqlq);
                                        $rowq = mysqli_fetch_assoc($resultq);
                                        $due=$rowq['user_due'];
                                        ?>
										<p class="row" style="text-align: left">
											<label for="amount" class="col-lg-4" style="color: #F28123; font-size:25px; font-weight: bold">Due Amount:</label>
											<input class="col-lg-8" type="number" placeholder="Amount" name="due"  value="<?php echo $due; ?>" readonly>
										</p>
                                        <p class="row" style="text-align: left">
											<label for="amount" class="col-lg-4" style="color: white; font-size:25px; font-weight: bold">Amount:</label>
											<input class="col-lg-8" type="number" placeholder="Amount" name="amount" maxlength="<?php echo $due; ?>" value="<?php echo $amount; ?>" required>
										</p>
										<!-- <p class="row" style="text-align: left">
											<label for="Reason" class="col-lg-4" style="color: white; font-size:25px; font-weight: bold">Reason:</label>
											<input class="col-lg-8" type="text" placeholder="Reason" name="reason" value="<?php echo $reason; ?>" required>
										</p> -->
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

	<br>
	<br>
	<br>
	<br>
	<br>
</body>
<?php include_once("footer.php") ?>
