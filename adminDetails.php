<?php 

include_once "connector.php";

if(isset($_POST['action'])){

$statement = $pdo->prepare("SELECT SUM(price) FROM bookings");
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);
$res = $result;

$clubbookings = $result['SUM(price)'];

$statement = $pdo->prepare("SELECT SUM(price) FROM venue_bookings");
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);

$venuebookings = $result['SUM(price)'];

$revenuebookings = $clubbookings + $venuebookings;

$statement = $pdo->prepare("SELECT COUNT(*) FROM payments");
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);


$totaltransactions = $result['COUNT(*)'];

$statement = $pdo->prepare("SELECT COUNT(*) FROM shops");
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);

$totalvendors = $result['COUNT(*)'];

$statement = $pdo->prepare("SELECT SUM(amount) FROM payments");
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);

$revenuepaylater = $result['SUM(amount)'];

$output = array(
    'clubbookings' => $clubbookings,
    'venuebookings' => $venuebookings,
    'revenuebookings' => $revenuebookings,
    'totaltransactions' => $totaltransactions,
    'totalvendors' => $totalvendors,
    'revenuepaylater' => $revenuepaylater
);

echo json_encode($output);

}
?>