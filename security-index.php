<?php 
    // echo $_SESSION['id'];
    include_once('security-header.php');
    include_once('config.php');
    if(isset($_SESSION['id'])){
        $id = $_SESSION["id"];
        $query = "SELECT * FROM gatepass WHERE approval_status = 'unapproved'";
        $result = mysqli_query($conn, $query);
    }
?>
<body>
    <div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Check Previous</p>
						<h1>Entries</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
    <br>
    <?php if(isset($_SESSION['id'])){ ?>
    <h3 class="card-body ml-5" style="color: #051922">Approve</h3>
    <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
        $itemid = $row['s_no'];
    ?>
    
    <div class="card-body box">

        <h4><span class="orange-text font-weight-bold">Visitor:</span> <span class="font-weight-bold" style="color:midnightblue"><?php echo $row['name'] ?></span></h4>
        <h4><span class="orange-text font-weight-bold">Phone Number:</span> <span class="font-weight-bold" style="color:midnightblue"><?php echo $row['ph_number'] ?></span></h4>
        <h4><span class="orange-text font-weight-bold">Purpose:</span> <span class="font-weight-bold" style="color:midnightblue"><?php echo $row['purpose'] ?></span></h4>
        <h4><span class="orange-text font-weight-bold">GatePass:</span> <span class="font-weight-bold" style="color:midnightblue; font-size: 150%"><?php echo $row['pass_code'] ?></span></h4>
        <!-- <p><span class="orange-text font-weight-bold">Approved By:</span> <span class="font-weight-bold" style="color:midnightblue"><?php echo $row['security_id'] ?></span></p> -->
        <h5 class="approval-status mr-3 mb-3">
        <?php if($row['approval_status'] == 'unapproved'){
            echo '<button class="btn-danger security-approval-button" style="border-radius: 5px; padding: 5px" data-item='.$itemid.'>Approve</button>';
        }
        else{
            echo '<a class="btn btn-success" style="border-radius: 5px">Approved</a>';
        }
        ?>
        
    </h5>
        
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