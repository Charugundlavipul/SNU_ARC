<?php
session_start();
include 'config.php';
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$phone = ($_POST['phone']);
    $reason = ($_POST['reason']);
    $id=$_SESSION['id'];
	$sql = "SELECT * FROM users WHERE id='$id'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
        $sql = "INSERT INTO gatepass (u_id, name,purpose)
					VALUES ('$id', '$name', '$reason')";
			$result = mysqli_query($conn, $sql);
            if ($result) {
				// echo "<script>alert('Sucessfully Created Gatepass.')</script>";
				$name = "";
				$phone = "";
				$reason="";
				
				// header("Location: signin.php");
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}


function randomPassword() {
    $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
?>