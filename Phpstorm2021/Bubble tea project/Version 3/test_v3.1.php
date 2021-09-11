
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
        Pearl Island
    </title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='index_v1.1.css'>
</head>
<body>
<header>
    <img alt="Bubble Tea logo" src="logo.jpg" width=3%>
    <nav>
        <a href="index_v3.1.php">Home</a>
        <a href="menu.php">Menu</a>
        <a href="specials.php">Specials</a>
    </nav>
</header>
<main>
    <h2>Test</h2>
    <img alt="Bubble tea image" src="bubble_tea.jpg" height="50%">
</main>
</body>
<footer>

</footer>
