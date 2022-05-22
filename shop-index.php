<?php 
    // echo $_SESSION['id'];
    include_once('shop-header.php');
    include_once('config.php');
    if(isset($_SESSION['id'])){
        $id = $_SESSION["id"];
        $seller_name=$_SESSION["username"];
        $query = "SELECT * FROM payments WHERE seller_id = '$seller_name'";
        $result = mysqli_query($conn, $query);
    }
?>
<body>
    <div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>SNU ARC</p>
						<h1>Transactions</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
    <br>
    
   
    <?php if(isset($_SESSION['id'])){ ?>
        <H3 style="margin-left: 25px;">Transcations:</H3>
    <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
        $itemid = $row['seller_id'];
    ?>
    
    <div class="card-body box">
        <?php 
        $user_id=$row["user_id"];
        $sql="SELECT * FROM users where id='$user_id'";
        
        $res11 = mysqli_query($conn, $sql);
        
        $res1 = mysqli_fetch_assoc($res11);
        $user_name=$res1["username"];
        $date1=Date($row['date']);
        ?>
        
        <h4><span class="orange-text font-weight-bold">Sender :</span> <span class="font-weight-bold" style="color:midnightblue"><?php echo $user_name ?></span></h4>
        <h4><span class="orange-text font-weight-bold">Amount:</span> <span class="font-weight-bold" style="color:midnightblue"><?php echo $row['amount'] ?></span></h4>
        <h4><span class="orange-text font-weight-bold">Purpose:</span> <span class="font-weight-bold" style="color:midnightblue"><?php echo $row['reason'] ?></span></h4>
        <h4><span class="orange-text font-weight-bold">Date:</span> <span class="font-weight-bold" style="color:midnightblue; font-size: 100%"><?php echo DateTime::createFromFormat("Y-m-d H:i:s",$row['date'])->format("d/m/Y"); ?></span></h4>
        <!-- <p><span class="orange-text font-weight-bold">Approved By:</span> <span class="font-weight-bold" style="color:midnightblue"><?php echo $row['shop_id'] ?></span></p> -->
        <h5 class="approval-status mr-3 mb-3">
            <?php
        echo '<span class="font-weight-bold" style="color: green">"Payment Received"</span>';
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