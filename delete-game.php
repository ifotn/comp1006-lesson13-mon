<?php ob_start();  // start the output buffer

// read the selected game_id from the url's querystring using GET
$game_id = $_GET['game_id'];

// if game_id is a number
if (is_numeric($game_id)) {

    // connect
    require_once('db.php');

    // first find the cover image name if there is one
    $sql = "SELECT cover_image FROM games WHERE game_id = :game_id";
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':game_id', $game_id, PDO::PARAM_INT);
    $cmd->execute();
    $cover_image = $cmd->fetchColumn();

    // delete image if there is one
    if (!empty($cover_image)) {
        unlink("images/$cover_image");
    }

    // write and run the delete query
    $sql = "DELETE FROM games WHERE game_id = :game_id";

    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':game_id', $game_id, PDO::PARAM_INT);
    $cmd->execute();

    // disconnect
    $conn = null;

    // redirect back to games.php
    header('location:games.php');
}

// clear the output buffer
ob_flush();
?>