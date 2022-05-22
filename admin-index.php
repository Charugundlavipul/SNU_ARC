



<?php 
    // echo $_SESSION['id'];
    include_once('admin-header.php');
    include_once('config.php');
    if(isset($_SESSION['id'])){
        $id = $_SESSION["id"];
        $name=$_SESSION["username"];
        $query = "SELECT * FROM admin WHERE admin_id = '$id'";
        $result = mysqli_query($conn, $query);
    }



    if (isset($_POST['submit'])) {

        $sql1="UPDATE users SET user_status='blocked' WHERE user_due != ''";
        $result1 = mysqli_query($conn, $sql1);
        
        // echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
?>
<body>
    <div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>SNU ARC</p>
						<h1>Admin</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
    <br>
    
    <!-- <H3 style="margin-left: 25px;">Transcations:</H3> -->
    <?php if(isset($_SESSION['id'])){ ?>
    <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
        $admin_name = $row['admin_name'];
    ?>
   
        <!-- code part -->
        <div class="container">
        <h3>SNU ARC Bookings</h3>
        <br>
        <div class="row mb-4">
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="card" style="width: auto; min-width: 22rem; height: 15rem;">
                    <div class="card-body">
                        <h5 class="card-title">Clubroom Bookings</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total number of club rooms booked by students</h6>
                        <div class = "card-body">
                            <h1 class = "card-text text-success" style="text-align: center" id="clubbookings">500</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="card" style="width: auto; min-width: 22rem; height: 15rem;">
                    <div class="card-body">
                        <h5 class="card-title">Sports venue Bookings</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total number of sports venues booked by students</h6>
                        <div class = "card-body">
                            <h1 class = "card-text text-success" style="text-align: center" id = "venuebookings">500</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="card" style="width: auto; min-width: 22rem; height: 15rem;">
                    <div class="card-body">
                        <h5 class="card-title">Revenue Generated</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total revenue generated from bookings of clubs and sports venues</h6>
                        <div class = "card-body">
                            <h1 class = "card-text text-success" style="text-align: center" id = "revenuebookings">500</h1>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <h3>SNU ARC Pay Later</h3>
        <br>
        <div class="row mb-5">
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="card" style="width: auto; min-width: 22rem; height: 15rem;">
                    <div class="card-body">
                        <h5 class="card-title">Total Transactions</h5>
                        <h6 class="card-subtitle mb-4 text-muted">Transactions by users using SNU ARC</h6>
                        <div class = "card-body">
                            <h1 class = "card-text text-success" style="text-align: center" id="totaltransactions">500</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="card" style="width: auto; min-width: 22rem; height: 15rem;">
                    <div class="card-body">
                        <h5 class="card-title">Total Vendors</h5>
                        <h6 class="card-subtitle mb-4 text-muted">Vendors using SNU ARC</h6>
                        <div class = "card-body">
                            <h1 class = "card-text text-success" style="text-align: center" id = "totalvendors">500</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="card" style="width: auto; min-width: 22rem; height: 15rem;">
                    <div class="card-body">
                        <h5 class="card-title">Revenue Generated</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total revenue generated from Placed Orders</h6>
                        <div class = "card-body">
                            <h1 class = "card-text text-success" style="text-align: center" id = "revenuepaylater">500</h1>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <h3>Block Defaulters</h3>
        <form action="" method="post">
        <div class="button_container">
			<div class="signin_btn">
        		<button name="submit" class="boxed-btn">Block</button><br>			
        	</div>
        </div>
        </form>
    </div>
    <br>


    <?php } ?>
    <?php }else{ ?>
        <div class="card-body text-center" style="margin: 300px 300px">
            <h1>Login to Access</h1>
        </div>
    <?php } ?>

    

</body>
<?php include_once('footer.php') ?>