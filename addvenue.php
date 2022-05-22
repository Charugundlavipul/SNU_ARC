<!doctype html>
<html lang="en">
<?php include_once 'admin-header.php' ?>


<?php 

include 'config.php';

?>
<?php

require_once "connector.php";
$seachWord = $_POST['search'] ?? false;

if($seachWord){
  $statement = $pdo->prepare("SELECT * FROM clubrooms WHERE room_id LIKE :title OR block LIKE :title OR capacity LIKE :title OR price LIKE :title OR size LIKE :title");
  $statement->bindValue(':title',"%$seachWord%");
}else{
  $statement = $pdo->prepare("SELECT * FROM clubrooms ORDER BY s_no");
}
$statement->execute();
$venues = $statement->fetchAll(PDO::FETCH_ASSOC);


?>


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
						<h1>Add Venue</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="conr">
  <div class='cont'>
  <!-- <div class='image-md'><img src="./assets/farmart.png" alt="Banner2"></div> -->
    <h3>Venue Details</h3>

    <p>
      <a href="createvenue.php" class="btn btn-success">Add Venue</a>
    </p>

    <!-- searching -->
    <form method="post"> 
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search for venues" name = 'search' value = <?php echo $seachWord ?>>
        <button class="btn btn-outline-info" type="submit" id="button-addon2">Search</button>
        <a href="addvenue.php" class="btn btn-outline-secondary">Reset</a>
      </div>
    </form>

    <table class="table"style="border: 2px solid;">
      <thead>
        <tr style = "text-align: center">
          <th scope="col">S.No</th>
          <!-- <th scope="col">Image</th> -->
          <th scope="col">Room Id</th>
          <th scope="col">Block</th>
          <th scope="col">Type</th>
          <th scope="col">Capacity</th>
          <th scope="col">Size</th>
          <th scope="col">Options</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($venues as $i => $venue) : ?>

          <tr style = "text-align: center">
          <td><?php echo $i+1 ?></td>
          <!-- <td><img src="<?php echo $venue['image'] ?>" class = 'image-sm'></td> -->
          <td><?php echo $venue['room_id'] ?></td>
          <td><?php echo $venue['block'] ?></td>
          <td><?php echo $venue['type'] ?></td>
          <td><?php echo $venue['capacity'] ?></td>
          <td><?php echo $venue['size'] ?></td>

          <td>
              <a href="updatevenue.php?venueid=<?php echo $venue['room_id']?>" class="btn btn-sm btn-outline-primary">Edit</a>
              <form style="display: inline-block" action="deletevenue.php" method="POST">
                <input type="hidden" name = 'venueid' value="<?php echo $venue['room_id']?>">
                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
              </form>
          </td>
          </tr>

        <?php endforeach; ?>

      </tbody>
    </table>
  </div>
</div>
  <?php include_once "footer.php" ?>
</html> 