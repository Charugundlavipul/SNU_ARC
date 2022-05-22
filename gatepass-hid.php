<?php 
    include_once("config.php");
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $reason = $_POST['reason'];
        $randomCode = $_POST['randomCode'];
        $ID = $_POST['ID'];

        $query = "INSERT INTO gatepass (name, ph_number, purpose, pass_code, u_id) VALUES ('$name','$phone','$reason','$randomCode','$ID')";
        $result = mysqli_query($conn, $query);

        echo $result;
    }
?>