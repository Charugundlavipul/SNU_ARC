<?php 
include_once('config.php');

if(isset($_POST['user'])){

    $user_id = $_POST['user'];
    $from = $_POST['from'];
    $date = $_POST['date'];
    $venue = $_POST['venue'];
    $price = $_POST['price'];

    $query = "SELECT * FROM users WHERE id = '$user_id'";
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result);

    $limit = $result['user_limit'];
    $due = $result['user_due'];

    $finallimit = $limit - $price;
    $finaldue = $due + $price;

    if($result['user_status'] == "unblocked" and $limit >= $price){
        
        $query = "INSERT INTO venue_bookings(user_id, venue_id, booking_date, from_time, price) VALUES('$user_id','$venue','$date','$from','$price')";
        $result = mysqli_query($conn, $query);

        $query = "UPDATE users SET user_due = '$finaldue', user_limit = '$finallimit' WHERE id = '$user_id'";
        $result = mysqli_query($conn, $query);

        $query = "SELECT * FROM shops WHERE shop_name = 'admin'";
        $result = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($result);

        $wallet = $result['shop_wallet'];
        $finalwallet = $wallet + $price;

        $query = "UPDATE shops SET shop_wallet = '$finalwallet' WHERE shop_name = 'admin'";
        $result = mysqli_query($conn, $query);

        echo $finallimit,$finaldue,$finalwallet;
    }
    else{
        echo "rejected";
    }
}
?>