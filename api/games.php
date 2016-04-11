<?php
// connect
require_once('../db.php');

// select the games and store the results
$sql = "SELECT * FROM games";

// check for a specific game name in the url
if (!empty($_GET['name'])) {
    $sql .= " WHERE name = :name";
}

$cmd = $conn->prepare($sql);

if (!empty($_GET['name'])) {
    $cmd->bindParam(':name', $_GET['name'], PDO::PARAM_STR);
}

$cmd->execute();
$games = $cmd->fetchAll();

// convert the php data array to json
$json_obj = json_encode($games);

// display the data
echo $json_obj;

// disconnect
$conn = null;
?>
