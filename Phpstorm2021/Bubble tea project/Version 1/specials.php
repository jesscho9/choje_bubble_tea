
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
        Pearl Island Specials
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
    <h2>Specials</h2>
    <!-- TODO images of products to go here-->
</main>
</body>
<footer>

</footer>

