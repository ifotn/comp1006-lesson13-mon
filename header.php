<!doctype html>
    <html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title><?php echo $page_title; ?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

    <!-- Font Awesome Css -->
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-default">
    <a href="default.php" title="COMP1006 Web Application" class="navbar-brand">
        <i class="icon-gamepad icon-2"></i> COMP1006 Web App</a>
    <ul class="nav navbar-nav navbar-right">

        <?php
        // private links
        // session_start();
        if (!empty($_SESSION['user_id'])) {
        ?>
            <li><a href="game.php" title="Add a Game">Add Game</a></li>
            <li><a href="games.php" title="View Games">View Games</a></li>
            <li><a href="gallery.php" title="Gallery">Cover Gallery</a></li>
            <li><a href="logout.php" title="Logout">Logout</a></li>
        <?php }
        else { ?>
         <li><a href="register.php" title="Register">Register</a></li>
            <li><a href="login.php" title="Login">Login</a></li>
        <?php } ?>

    </ul>
</nav>

<main class="container">