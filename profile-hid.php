<?php 
    session_start();
    include_once('config.php');
    if(isset($_POST['submit'])){
        $username = $_POST['updateName'];
        $email = $_POST['updateEmail'];
        $phonenumber = $_POST['updatePhonenumber'];
        $id = $_SESSION['id'];
        $sql = "UPDATE users SET username = '$username', email = '$email', phonenumber = '$phonenumber' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['phonenumber'] = $phonenumber;
            header("Location: profile.php");
        }
    }
?>