<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save Upload</title>
</head>
<body>

<?php
// get file details
$name = $_FILES['any_file']['name'];
echo "Name: $name<br />";

$size = $_FILES['any_file']['size'];
echo "Size: $size<br />";

$type = $_FILES['any_file']['type'];
echo "Type: $type<br />";
echo "Mime Content Type: " . mime_content_type($_FILES['any_file']['tmp_name']) . '<br />';

$tmp_name = $_FILES['any_file']['tmp_name'];
echo "Tmp Name: $tmp_name<br />";

// use the session to generate a unique name
session_start();
$final_name = session_id() . '-' . $name;

// copy to the uploads folder permanently
move_uploaded_file($tmp_name, "uploads/$final_name");

// show if it's an image
if ($type == 'image/jpeg') {
    echo '<img src="uploads/' . $final_name . '" />';
}
?>

</body>
</html>
