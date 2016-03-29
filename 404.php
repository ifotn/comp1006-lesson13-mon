<?php
$page_title = null;
$page_title = 'COMP1006 Web Application | Page Not Found';

session_start();
require_once('header.php');
?>

    <div class="jumbotron">
        <h3>Something is missing</h3>
        <p>We can't find the page you requested.  Try one of the links above.</p>
    </div>

<?php require_once('footer.php'); ?>