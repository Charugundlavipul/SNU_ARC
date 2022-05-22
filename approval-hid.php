<?php 
session_start();
include_once('config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $itemid = $_POST['itemid'];
    $id = $_SESSION['id'];
    $query = "UPDATE gatepass SET security_id = '$id', approval_status = 'approved' WHERE s_no = '$itemid'";
    $result = mysqli_query($conn, $query);
}
?>