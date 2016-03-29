<?php ob_start();

// auth
require_once('auth.php');

// store the form inputs in variables
$name = $_POST['name'];
$age_limit = $_POST['age_limit'];
$release_date = $_POST['release_date'];
$size = $_POST['size'];

// add game_id in case we are editing
$game_id = $_POST['game_id'];

// create a flag to track the completion status of the form
$ok = true;

// do our form validation before saving
if (empty($name)) {
    echo 'Name is required<br />';
    $ok = false;
}

if (empty($age_limit) || !is_numeric($age_limit)) {
    echo 'Age limit is required and must be a number<br />';
    $ok = false;
}

if (empty($release_date) || !is_numeric($release_date)) {
    echo 'Release date is required and must be a number<br />';
    $ok = false;
}

if (empty($size) || !is_numeric($size)) {
    echo 'Size is required and must be a number<br />';
    $ok = false;
}

// check for photo, validate, and save it if we have one
if (!empty($_FILES['cover_image']['name'])) {
    $cover_image = $_FILES['cover_image']['name'];
    $type = $_FILES['cover_image']['type'];
    $tmp_name = $_FILES['cover_image']['tmp_name'];

    // validate file type
    if ($type != 'image/jpeg') {
        echo 'Invalid JPG<br />';
        $ok = false;
    }
    else {

        if ($ok) {
            // save the image if no validation errors found
            $final_image = session_id() . "-" . $cover_image;
            move_uploaded_file($tmp_name, "images/$final_image");
        }
    }
}

// save ONLY IF the form is complete
if ($ok) {

    // connecting to the database
    require_once('db.php');

    // if we have an existing game_id, run an update
    if (!empty($game_id)) {
        $sql = "UPDATE games SET name = :name, age_limit = :age_limit,
          release_date = :release_date, size = :size, cover_image = :cover_image WHERE game_id = :game_id";
    }
    else {
        // set up an SQL command to save the new game
        $sql = "INSERT INTO games (name, age_limit, release_date, size, cover_image)
          VALUES (:name, :age_limit, :release_date, :size, :cover_image)";
    }

    // set up a command object
    $cmd = $conn->prepare($sql);

    // fill the placeholders with the 4 input variables
    $cmd->bindParam(':name', $name, PDO::PARAM_STR, 50);
    $cmd->bindParam(':age_limit', $age_limit, PDO::PARAM_INT);
    $cmd->bindParam(':release_date', $release_date, PDO::PARAM_INT);
    $cmd->bindParam(':size', $size, PDO::PARAM_INT);
    $cmd->bindParam(':cover_image', $final_image, PDO::PARAM_STR, 255);

    // add the game_id param if updating
    if (!empty($game_id)) {
        $cmd->bindParam(':game_id', $game_id, PDO::PARAM_INT);
    }

    // execute the insert
    $cmd->execute();

    // show message
    //echo "Game Saved";

    // disconnecting
    $conn = null;
    header('location:games.php');

    // send confirmation email

}

require_once('footer.php');
ob_flush(); ?>
