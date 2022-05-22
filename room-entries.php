<?php 
    include_once('header.php');
    include_once('config.php');
    // session_start();

    $id = $_SESSION["id"];

    $query = "SELECT * FROM bookings WHERE user_id = '$id'";
    $result = mysqli_query($conn, $query);


    // $result = mysqli_fetch_assoc($result);
?>

<body>
    <div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Check Previous</p>
						<h1>Room-Bookings</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
    <br>
    <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
    
    <div class="card-body box py-4">

        <h4><span class="orange-text font-weight-bold">Room_ID:</span> <span class="font-weight-bold" style="color:midnightblue"><?php echo $row['room_id'] ?></span></h4>
        <h4><span class="orange-text font-weight-bold">Booking Date:</span> <span class="font-weight-bold" style="color:midnightblue"><?php $date = strtotime($row['booking_date']);
            echo date('l jS, F Y ', $date); ?></span></h4>
        <h4><span class="orange-text font-weight-bold">Slot:</span> <span class="font-weight-bold" style="color:midnightblue"><?php echo $row['from_time'].":00 to ".($row['from_time']+1).":00" ?></span></h4>
        <!-- <p><span class="orange-text font-weight-bold">Approved By:</span> <span class="font-weight-bold" style="color:midnightblue"><?php echo $row['security_id'] ?></span></p> -->
        <h5 class="approval-status mr-3 mb-2"><span style="color: #051922; font-weight: bold">Booked On:</span><span class="orange-text font-weight-bold"> 
            <?php $date = strtotime($row['booked_on']);
            echo date('l jS, F Y h:i:s A', $date);?>
            </span>
        <!-- <?php if($row['approval_status'] == 'unapproved'){
            echo '<span class="font-weight-bold" style="color: red">'.$row['approval_status'].'</span>';
        }
        else{
            echo '<span class="font-weight-bold" style="color: green">'.$row['approval_status'].'</span>';
        }
        ?> -->
        </h5>
        
    </div>
    <br>


    <?php } ?>

    

</body>
	<!-- end hero area -->
<?php include_once("footer.php"); ?>