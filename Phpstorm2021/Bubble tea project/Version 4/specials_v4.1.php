
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
        珍珠岛 Pearl Island Specials
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
    <h1>珍珠岛 Specials</h1>
    <!-- TODO make it so that when user clicks on bubble tea image takes them to the menu search of the drink they clicked on.  -->
    <a href="drinks_info.php">
        <img alt="The tallest bubble tea drink you'll ever drink" height=40% src="images/tall_bubbletea.jpg">
    </a>
    <img alt="Peach Green Tea" height=40% src="images/peach_greentea1.jpg">
    <img alt="Bubble tea image" src="images/bubble_tea.jpg" height="50%">

</main>
</body>
<footer>

</footer>
</html>

