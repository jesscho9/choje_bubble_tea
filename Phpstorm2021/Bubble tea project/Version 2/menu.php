
<?php

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

?>


<!DOCTYPE html>

<html lang="en">
<head>
    <title>
        Pearl Island Menu
    </title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='index.css'>
</head>
<body>
<header>
    <nav>
        <a href="index.php">Home</a>
        <a href="menu.php">Menu</a>
        <a href="specials.php">Specials</a>
    </nav>
</header>
<main>
    <h2>Menu</h2>
    <h4>Feel free to browse through the menu of bubble teas or search and filter bubble teas of your choice. </h4>
    <!-- TODO table of products to go here-->
</main>
</body>
<footer>

</footer>

