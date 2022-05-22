<?php
require_once "connector.php";
require_once "config.php";
require_once "functions.php";

$itemid = $_POST['venueid'] ?? null;

if(!$itemid){
    header("Location: addvenue.php");
    exit;
}

$statement = $pdo->prepare("DELETE FROM clubrooms WHERE room_id = :itemid");
$statement->bindValue(':itemid', $itemid);
$statement->execute();
header("Location: addvenue.php");