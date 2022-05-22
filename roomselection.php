<?php 
	include_once("header.php");
	require_once("functions.php");

?>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->

	
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>SNU Arc</p>
						<h1>Room Bookings</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->


	<?php if(isset($_SESSION['id'])){ ?>
	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".Small">Small</li>
							<li data-filter=".Medium">Medium</li>
                            <li data-filter=".Large">Large</li>
                            <li data-filter=".VeryLarge">Very Large</li>
                        </ul>
                    </div>
                </div>
            </div>

			<div class="row product-lists">
				<?php foreach ($product_shuffle1 as $item) { ?>
				
				<div class="col-lg-4 col-md-6 text-center <?php echo $item["size"]?>">
					<div class="single-product-item">
						<div class="product-image">
							<img src=" <?php echo $item["image"]?>" alt="">
						</div>
						<h3><?php echo $item["room_id"]?></h3>
						<?php
							if($item["price"]=="0")
							{
								echo '<p class="product-price"><span>'?> <?php echo $item["block"]?><?php echo '</span>'?><?php echo 'Free'?><?php echo'</p>';
							}
							else{
								echo '<p class="product-price"><span>'?> <?php echo $item["block"]?><?php echo '</span>'?><?php echo $item["price"]?><?php echo'₹</p>';
							}
						
						?>
						<?php 
						if($item["type"]=="available") { ?>
							<?php if($item["price"]!="0") { ?>
								<a href="<?php printf('%s?room_id=%s', 'product.php',  $item['room_id']); ?>"><?php echo "<a href='room-details.php?r_id=${item['room_id']}' type='button' name='top_sale_submit'  class='cart-btn'>View Options</a>"?></a>
							<?php } else{
								echo'<a class="cart-btn1"> Available</a>';
							}?>
						<?php } 
						else{
							echo'<a class="cart-btn2"> Unavailable</a>';
							}
						?>
				
					</div>
				</div>	
				<?php } ?>
			</div>

			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a class="active" href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<?php }else{ ?>
        <div class="card-body text-center" style="margin: 300px 300px">
            <h1>Login to Access</h1>
        </div>
    <?php } ?>

	<!-- footer -->
	<?php include_once("footer.php"); ?>
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>
</html>