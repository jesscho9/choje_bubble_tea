
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
    <link rel='stylesheet' type='text/css' href='index.css'>
</head>
<body>
<header>
    <h1>珍珠岛 Specials</h1>

    <nav>
        <a href="index1.php">HOME</a>
        <a href="menu1.php">MENU</a>
        <a href="specials.php">SPECIALS</a>
        <a href="login.php">LOGIN</a>
    </nav>
</header>
<main>
    <!-- TODO make it so that when user clicks on bubble tea image takes them to the menu search of the drink they clicked on.  -->
    <!-- can hardcode it into data ? -->
    <!-- wanting to add a hyperlink to the image -->
    <!-- TODO CHANGE LINKS -->
    <a href="menu1.php?drinktypes=&bubbletea_name=brown+sugar+milk+tea&order_bubbleteas=product_name_asc&search_button=Search">
        <img alt="Brown Sugar Milk Tea" height=40% src="images/tall_bubbletea.jpg">
    </a>
    <a href="menu1.php?drinktypes=&bubbletea_name=peach+green+tea&order_bubbleteas=product_name_asc&search_button=Search">
        <img alt="Peach Green Tea" height=40% src="images/peach_greentea1.jpg">
    </a>
    <a href="menu1.php?drinktypes=&bubbletea_name=Hokkaido+Cake+Cream+Drink&order_bubbleteas=product_name_asc&search_button=Search">
        <img alt="Hokkaido Cake Cream Drink" src="images/bubble_tea.jpg" height="40%">
    </a>
    <a href="menu1.php?drinktypes=&bubbletea_name=Hokkaido+Cake+Cream+Drink&order_bubbleteas=product_name_asc&search_button=Search">
        <img alt="Mocha Milk Foam Drink" src="images/mocha_milk_foam_drink.jpg" height="40%">
    </a>
    <a href="menu1.php?drinktypes=&bubbletea_name=Hokkaido+Cake+Cream+Drink&order_bubbleteas=product_name_asc&search_button=Search">
        <img alt="Oreo Cake Cream Milk Tea" src="images/oreo_cake_cream_milk_tea.jpg" height="40%">
    </a>
    <a href="menu1.php?drinktypes=&bubbletea_name=Hokkaido+Cake+Cream+Drink&order_bubbleteas=product_name_asc&search_button=Search">
        <img alt="Oreo Chocolate Smoothie" src="images/oreo_chocolate_smoothie.jpg" height="40%">
    </a>
    <a href="menu1.php?drinktypes=&bubbletea_name=Hokkaido+Cake+Cream+Drink&order_bubbleteas=product_name_asc&search_button=Search">
        <img alt="Passionfruit and Peach Yoghurt" src="images/passionfruit_and_peach_yoghurt.jpg" height="40%">
    </a>
    <a href="menu1.php?drinktypes=&bubbletea_name=Hokkaido+Cake+Cream+Drink&order_bubbleteas=product_name_asc&search_button=Search">
        <img alt="Strawberry Slushy" src="images/strawberry_slushy.jpg" height="40%">
    </a>

</main>
</body>
<footer>

</footer>
</html>

