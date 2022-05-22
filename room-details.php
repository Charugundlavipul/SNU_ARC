<?php 
	include_once("header.php");
	include_once("functions.php");
	include_once("config.php");
?>
<?php 

	if($_SERVER["REQUEST_METHOD"] == "GET"){
		$inputdate = "";
		$room_id = $_GET['r_id'];
		$query = "SELECT * FROM clubrooms WHERE room_id = '$room_id'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);

		if(isset($_GET['inputdate']))
			$inputdate = $_GET['inputdate'];
	} 

?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>See more Details</p>
						<h1>Room <?php echo $row['room_id'] ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src= <?php echo $row['image']?> alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3><?php echo $row['room_id'] ?></h3>
						<p class="single-product-pricing">Rs.<?php echo $row['price'] ?>/slot</p>
						<p>Book rooms for club discussions, events</p>

						<div class="single-product-form">
							<form action="room-details.php" method="get">
								<input type="hidden" name="r_id" value="<?php echo $room_id?>">
								<div class="row mb-4 ml-1">
									<label for="date" class="orange-text" style="font-weight: bold;">Select Date</label>
									<div class="input-group date col-6" id="datepicker">
										<input type="text" class="form-control" name="inputdate" id="date" value="<?php echo $inputdate?>"/>
										<span class="input-group-append">
										<span class="input-group-text bg-light d-block">
											<i class="fa fa-calendar"></i>
										</span>
										</span>
									</div>
								</div>
								<button type="submit" name="submit" id="showSlots" class="boxy-btn mb-4" style="font-size: 15px; padding: 5px 10px; color: white">Show Slots</button>						
							</form>

							<div class="mb-4 mt-3">
							<?php if(isset($_GET['inputdate'])){ 
									include_once "config.php";
									echo "<h3 class='text-success'>Available Slots</h3>";						
									for ($i=6; $i < 12; $i++) { 
										$query = "SELECT * FROM bookings WHERE room_id='$room_id' AND booking_date='$inputdate' AND from_time='$i'";
										$result = mysqli_query($conn, $query);
										if(!mysqli_num_rows($result) > 0){ #if
									?>										
										<button type="button" class="btn btn-outline-primary shadow-none mr-1 mb-2 slotTimes" data-from="<?php echo $i?>" data-date="<?php echo $inputdate?>" data-room="<?php echo $room_id?>" data-user="<?php echo $_SESSION['id']?>" data-price="<?php echo $row['price']; ?>"><?php echo $i.":00 - ".($i+1).":00" ?></button>
									<?php }else{ ?>
										<button type="button" class="btn btn-outline-warning shadow-none mr-1 mb-2"><?php echo $i.":00 - ".($i+1).":00" ?></button>
									<?php } ?>
								<?php } ?>						
							<?php } ?>
							</div>
							
							<p><strong>Categories: </strong>Rooms, <?php echo $row['size'] ?></p>
						</div>
						<h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.php"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						<p class="product-price"><span>Per Kg</span> 85$ </p>
						<a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.php"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
						</div>
						<h3>Berry</h3>
						<p class="product-price"><span>Per Kg</span> 70$ </p>
						<a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.php"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
						</div>
						<h3>Lemon</h3>
						<p class="product-price"><span>Per Kg</span> 35$ </p>
						<a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end more products -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

	<!-- footer -->
	<?php include_once("footer.php") ?>
	<script>
		$(document).ready(function () {
        $("#datepicker").datepicker({ startDate: "+0d", endDate: "+7d" });
        $('#datepicker').datepicker();
    });
	</script>
	<script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>