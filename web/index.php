<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="CSE-341">
    <meta name="keywords" content="">
    <meta name="author" content="Philip Bowler">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>"Philip Bowler's CSE-341 Home Page"</title>
    <link rel="stylesheet" type="text/css" href="myStyle.css">
    <script src="myJs.js"></script>
</head>
<body>
<header>
    <div id="banner">
        <?php include 'logo.php';?>
        <h1>Philip Bowler's CSE 341 Home Page</h1>
    </div>
</header>
<section id="main">
    <div id="picture">
        <figure>
            <img src="img/me.jpg" alt="My wife and I" width="173" height="164" id="me">
        </figure>
        <div>
            <?php
            echo "Arizona time and date is " . date("Y/m/d  h:i:sa");
            ?>
        </div>
    </div>
    <div>
        <a href="assignments.php">Assignments</a>
    </div>
</section>
<footer>
    <?php include 'footer.php';?>
</footer>
</body>
</html>