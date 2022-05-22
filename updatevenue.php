
<?php
ob_start();
require_once "connector.php";
// require_once "Template/functions.php";

$venueid = $_GET['venueid'] ?? null;

if(!$venueid){
    header("Location: addvenue.php");
    exit;
}

$statement = $pdo->prepare("SELECT * FROM clubrooms WHERE room_id = :venueid");
$statement->bindValue(':venueid', $venueid);
$statement->execute();
$item = $statement->fetch(PDO::FETCH_ASSOC);

$errors = [];
$room_id=$item['room_id'];
$block=$item['block'];
$type=$item['type'];
$capacity=$item['capacity'];
$price=$item['price'];
$image=$item['image'];
$size=$item['size'];
// $item_name = $item['item_name'];
// $item_description = $item['item_description'];
// $variety = $item['variety'];
// $item_rating = $item['item_rating'];
// $image = $item['item_image'];
// $quantity = $item[''];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  
$room_id=$_POST['room_id'];
$block=$_POST['block'];
$type=$_POST['type'];
$capacity=$_POST['capacity'];
$price=$_POST['price'];

$size=$_POST['size'];
  // $item_name = $_POST['item_name'];
  // $item_description = $_POST['item_description'];
  // $variety = $_POST['variety'];
  // $item_rating = $_POST['item_rating'];
  //   $quantity = $_POST['quantity'];

  if (!$block) {
    $errors[] = 'Please fill the Block';
  }

//   if (!$quantity) {
//     $errors[] = 'Please fill the quantity';
//   }

  if (!$type) {
    $errors[] = 'Please fill the type';
  }

  if ($price == '') {
    $errors[] = 'Please fill the price';
  }
  if ($capacity == '') {
    $errors[] = 'Please fill the Capacity';
  }
  if ($size == '') {
    $errors[] = 'Please fill the Size';
  }
  if(empty($errors)){
    
    $image = $_FILES['image'] ?? null;
    $imagePath = $item['image'];

    if($image && $image['tmp_name']){

        if($item['image']){
            unlink(''.$item['image']);
        }

        $imagePath = './assets/img/products'.$image['name'];
        move_uploaded_file($image['tmp_name'], ''.$imagePath);
    }

    $statement = $pdo->prepare("UPDATE clubrooms SET block = :block, image = :image, type = :type, capacity= :capacity,price=:price,size=:size WHERE room_id = :venueid");
    echo $venueid;
    // $statement->bindValue(':item_name', $item_name);
    // $statement->bindValue(':room_id', $room_id);
    // $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':type', $type);
    $statement->bindValue(':capacity', $capacity);
    $statement->bindValue(':image', $imagePath);
    $statement->bindValue(':block', $block);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':size', $size);
    $statement->bindValue(':venueid', $venueid);
    // $statement->bindValue(':quantity', $quantity);

    $statement->execute();

    header("Location: addvenue.php");
  }
}

?>

<!doctype html>
<html lang="en">

  <?php include 'admin-header.php' ?>
  <!-- <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div> -->
    <!--PreLoader Ends-->
	
	<!-- header -->

	
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>SNU Arc</p>
						<h1>Update Venue</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
  <div class="conr">

    <p><a href="addvenue.php" class="btn btn-secondary">Back to Venues</a></p>
    <h3>Update Venue</h3>

    <?php require_once "config.php";?>

    <?php if(!empty($errors)): ?>
      <div class="alert alert-danger">
        <?php foreach($errors as $error): ?>
          <div><?php echo $error ?></div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>


    <form action = "" method = "POST" enctype="multipart/form-data">

      <div class="mb-3">
        <?php if($image):?>
            <div class="mb-1"><img src="<?php echo ''.$image?>" class = 'image-md'></div>
        <?php endif; ?>
        <div class="custom-file"></div>
        <label class="form-label">Image</label>
        <input type="file" name = "image" class="form-control-file" id="inputGroupFile02">
      </div>
      

      <div class="mb-3">
        <label class="form-label">Room_Id</label>
        <input type="text" name = "room_id" class="form-control" value = "<?php echo $room_id ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Block</label>
        <input type="text" name = "block" class="form-control" value = "<?php echo $block ?>">
        <!-- <textarea name="block" class="form-control"><?php echo $block ?></textarea> -->
      </div>

      <!-- <div class="mb-3">
        <label class="form-label">Quantity</label>
        <input type="number" name = "quantity" class="form-control" value = "<?php echo $quantity ?>">
      </div> -->

      <div class="mb-3">
        <label class="form-label">Type</label>
        <input type="text" name = "type" class="form-control" value = "<?php echo $type ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Capacity</label>
        <input type="number"  name = "capacity" class="form-control" value = "<?php echo $capacity ?>"style="width:100%">
      </div>

      <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number"  name = "price" class="form-control" value = "<?php echo $price ?>"style="width:100%">
      </div>

      <div class="mb-3">
        <label class="form-label">Size</label>
        <input type="text" name = "size" class="form-control" value = "<?php echo $size ?>">
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>

    </form>

  </div>
  <?php include_once "footer.php" ?>
</html> 