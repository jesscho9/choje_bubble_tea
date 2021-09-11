<?php

session_start();

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

// Checks whether the user has logged in or not.
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == True) {
    echo "You are a VIP!";
} else {
    echo "Please log in first to see this page.";
}


?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title>
        珍珠岛 Pearl Island Add Bubble Tea
    </title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='index_v4.1.css'>
</head>
<body>
<header>
    <nav>
        <a href="index1.php">HOME</a>
        <a href="menu1_v4.1.php">MENU</a>
        <a href="specials_v4.1.php">SPECIALS</a>
        <a href="login_v4.1.php">LOGIN</a>
    </nav>
</header>
<main>
    <h2>Hello! Privileged and honourary member of the Pearl Island family, welcome</h2>
    <h2>Add A Bubble Tea</h2>

    <form action="insert_bubbleteas1.php" method="post">
        Drink Name: <input type="text" name="Name"><br>
        Drink Type: <input type="text" name="DrinkType"><br>
        Regular Price: <input type="text" name="RPrice"><br>
        Large Price: <input type="text" name="LPrice"><br>
        Can this drink be warm? <input type="text" name="CanBeHot"><br>
        <input type="submit" value="Insert">
    </form>

</main>
</body>
<footer>

</footer>

</html>
