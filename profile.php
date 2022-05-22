<?php include_once("header.php"); ?>


    <!-- hero area -->
<body>
    <div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Check/Edit Info</p>
						<h1>Profile</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div class="card-body">
        <div class="billing-address-form">

            <form action="profile-hid.php" method="post">
                <p><input type="text" placeholder="Name" name="updateName" value='<?php echo $_SESSION['username']?>'></p>
                <p><input type="email" placeholder="Email" name="updateEmail" value='<?php echo $_SESSION['email']?>' readonly></p>
                <p><input type="text" placeholder="PhoneNumber" name="updatePhonenumber" value='<?php echo $_SESSION['phonenumber'] ?>'></p>
                <!-- <p><input type="tel" placeholder="Phone"></p> -->
                <!-- <p><textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea></p> -->
                <div class="register_btn">
                    <button name="submit" class = "boxy-btn">Update</button><br>			
                </div>
            </form>

            <a href="entries.php">Previous Gate Entries</a>
            <br>
            <a href="ground-entries.php">Previous Ground Bookings</a>
            <br>
            <a href="room-entries.php">Previous Room Bookings</a>
            <br>
            <a href="payment-entries.php">Previous Shop Payments</a>
            
        </div>
    </div>

</body>
	<!-- end hero area -->
<?php include_once("footer.php"); ?>