<?php ob_start();

require_once ('auth.php');

// head
$page_title = 'Game Cover Gallery';
require_once ('header.php');

// connect and run query to get the cover images
require_once ('db.php');
$sql = "SELECT game_id, name, cover_image FROM games WHERE cover_image IS NOT NULL ORDER BY name";
$cmd = $conn->prepare($sql);
$cmd->execute();
$games = $cmd->fetchAll();

echo '<h1>Game Cover Gallery</h1>';
foreach ($games as $game) {
    echo '<div class="col-sm-3 col-md-4">
        <a href="game.php?game_id=' . $game['game_id'] . '" class="thumbnail">
            <img src="images/' . $game['cover_image'] . '" title="Game Cover" />
        </a></div>';
}

// disconnect
$conn = null;

require_once('footer.php');
ob_flush(); ?>