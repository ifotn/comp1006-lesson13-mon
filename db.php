<?php

$conn = new PDO('mysql:host=127.0.0.1;dbname=gc', '', '');
$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>