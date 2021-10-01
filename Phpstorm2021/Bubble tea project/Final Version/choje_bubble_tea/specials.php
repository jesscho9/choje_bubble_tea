
<?php

session_start();

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "<span style='visibility: hidden'>connected to database</span>";

}

?>


<!DOCTYPE html>

<html lang="en">
<head>
    <title>
        珍珠岛 Pearl Island Specials
    </title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='index.css'>
</head>
<body>
<header>
    <h1><a href="index1.php"><img src="images/logo.jpg" alt="bubbletea_logo" width=4%/>珍珠岛</a></h1>
    <h3>Pearl Island</h3>
    <nav>
        <a href="index1.php">HOME</a>
        <a href="menu1.php">MENU</a>
        <a href="specials.php">SPECIALS</a>
        <?php
        // Checks whether the user has successfully logged in or not and if they have then displays extra navigation links below
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == True) {
            ?>
            <a href="process_logout1.php">LOGOUT</a>
            <?php
        } else {
            echo "<a href=\"login.php\">LOGIN</a>";
        }
        ?>
    </nav>
</header>
<main>
    <!-- images with links to the menu page showing that specific drink -->
    <a href="menu1.php?drinktypes=&bubbletea_name=brown+sugar+milk+tea&order_bubbleteas=product_name_asc&search_button=Search">
        <img alt="Link to Brown Sugar Milk Tea: menu1.php?drinktypes=&bubbletea_name=brown+sugar+milk+tea&order_bubbleteas=product_name_asc&search_button=Search"
             src="images/tall_bubbletea.jpg" height=40%>
    </a>
    <a href="menu1.php?drinktypes=&bubbletea_name=peach+green+tea&order_bubbleteas=product_name_asc&search_button=Search">
        <img alt="Link to Peach Green Tea: menu1.php?drinktypes=&bubbletea_name=peach+green+tea&order_bubbleteas=product_name_asc&search_button=Search"
             src="images/peach_greentea1.jpg" height=40%>
    </a>
    <a href="menu1.php?drinktypes=&bubbletea_name=Hokkaido+Cake+Cream+Drink&order_bubbleteas=product_name_asc&search_button=Search">
        <img alt="Link to Hokkaido Cake Cream Drink: menu1.php?drinktypes=&bubbletea_name=Hokkaido+Cake+Cream+Drink&order_bubbleteas=product_name_asc&search_button=Search"
             src="images/bubble_tea.jpg" height="40%">
    </a><br>
    <a href="menu1.php?http://dtweb.wgc.school.nz/choje/choje_bubble_tea/menu1.php?drinktypes=&bubbletea_name=Mocha+Milk+Foam+Drink&order_bubbleteas=product_name_asc&search_button=Search">
        <img alt="Link to Mocha Milk Foam Drink: menu1.php?http://dtweb.wgc.school.nz/choje/choje_bubble_tea/menu1.php?drinktypes=&bubbletea_name=Mocha+Milk+Foam+Drink&order_bubbleteas=product_name_asc&search_button=Search"
             src="images/mocha_milk_foam_drink.jpg" height="40%">
    </a>
    <a href="menu1.php?drinktypes=&bubbletea_name=Original+Milk+Tea&order_bubbleteas=product_name_asc&search_button=Search">
        <img alt="Link to Original Milk Tea: menu1.php?drinktypes=&bubbletea_name=Original+Milk+Tea&order_bubbleteas=product_name_asc&search_button=Search"
             src="images/original_milk_tea.jpg" height="40%">
    </a>
    <a href="menu1.php?drinktypes=&bubbletea_name=Oreo+Cake+Cream+Milk+Tea&order_bubbleteas=product_name_asc&search_button=Search">
        <img alt="Link to Oreo Cake Cream Milk Tea: menu1.php?drinktypes=&bubbletea_name=Oreo+Cake+Cream+Milk+Tea&order_bubbleteas=product_name_asc&search_button=Search"
             src="images/oreo_cake_cream_milk_tea.jpg" height="40%">
    </a><br>
    <a href="menu1.php?drinktypes=&bubbletea_name=Oreo+Chocolate+Smoothie&order_bubbleteas=product_name_asc&search_button=Search">
        <img alt="Link to Oreo Chocolate Smoothie: menu1.php?drinktypes=&bubbletea_name=Oreo+Chocolate+Smoothie&order_bubbleteas=product_name_asc&search_button=Search"
             src="images/oreo_chocolate_smoothie.jpg" height="40%">
    </a>
    <a href="menu1.php?drinktypes=&bubbletea_name=Passionfruit+and+Peach+Yoghurt&order_bubbleteas=product_name_asc&search_button=Search">
        <img alt="Link to Passionfruit and Peach Yoghurt: menu1.php?drinktypes=&bubbletea_name=Passionfruit+and+Peach+Yoghurt&order_bubbleteas=product_name_asc&search_button=Search"
             src="images/passionfruit_and_peach_yoghurt.jpg" height="40%">
    </a>
    <a href="menu1.php?drinktypes=&bubbletea_name=Strawberry+Slushy&order_bubbleteas=product_name_asc&search_button=Search">
        <img alt="Link to Strawberry Slushy: menu1.php?drinktypes=&bubbletea_name=Strawberry+Slushy&order_bubbleteas=product_name_asc&search_button=Search"
             src="images/strawberry_slushy.jpg" height="40%">
    </a>

</main>
</body>

</html>

