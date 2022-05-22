<?php 
session_start();
include_once('config.php');

if(isset($_POST['venueid'])){
    // $itemid = $_POST['itemid'];
    $venueid = $_POST['venueid'];
    $status = $_POST['status'];
    $id = $_SESSION['id'];
    $query = "UPDATE sportsvenue SET `status` = '$status' WHERE venue_id = '$venueid'";
    $result = mysqli_query($conn, $query);

    echo $result;
}
?>