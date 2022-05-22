<?php 
session_start();
include_once('config.php');

if(isset($_POST['roomid'])){
    // $itemid = $_POST['itemid'];
    $roomid = $_POST['roomid'];
    $status = $_POST['status'];
    $id = $_SESSION['id'];
    $query = "UPDATE clubrooms SET `type` = '$status' WHERE room_id = '$roomid'";
    $result = mysqli_query($conn, $query);

    echo $result;
}
?>