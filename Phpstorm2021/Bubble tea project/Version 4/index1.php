
<?php

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

$all_drinktypes_query = "SELECT * FROM `drinktypes`";
$all_drinktypes_result = mysqli_query($con, $all_drinktypes_query);

?>


<!DOCTYPE html>

<html lang="en">
<head>
    <title>
        珍珠岛 Pearl Island
    </title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='index_v4.1.css'>
</head>
<body>
<header>
    <!--<img src="possible_header_image.jpg", height=100%">-->
    <img alt="Bubble Tea logo" src="logo.jpg" width=6%>
    <h1>珍珠岛 Pearl Island!!!!!!!!!!</h1>
    <nav>
        <a href="index.php">HOME</a>
        <a href="menu.php">MENU</a>
        <a href="specials_v4.1.php">SPECIALS</a>
        <a href="login_v4.1.php">LOGIN</a>
        <a href="test_v4.1.php">Test</a>
    </nav>
</header>

<main>
    <div>
        <h2>Welcome!</h2>
        <p>This is an informational website about bubble tea, the best drink ever! </p>
        <p>There are no orders are available here as this is a collation of many bubble tea shops in Wellington, making
            this the best informational bubble tea site there is. However I do apologise in advance for any inconvenience
            this may cause. Almost a blog, but not quite! </p>
        <p>There are different sugar level and ice levels to choose from as well as different sizes for some shops. </p>
    </div>
    <div>
        <h2>A Bit About Bubble Tea</h2>
        <p>Here is some history of bubble tea, for all you odd history lovers. <br> Bubble Tea originated in Taiwan, and
            since then has became internationally famous! </p>
    </div>
    <h2>Filter your bubble tea search</h2>
    <p>Here you can pick specific criteria to filter your search, or simply click straight onto the menu tab, which will
        show you our whole menu. </p>
    <form name='search_bubble_tea_form' id='search_bubble_tea_form' method = 'get' action='menu1_v4.1.php'>
        <table>
            <tr>
                <td>Drink series: </td>
                <td>
                    <select id='drinktypes' name='drinktypes'>
                        <option value="">All Drink Series</option>
                        <!--shows the other options - php below-->
                        <?php
                        while ($all_drinktypes_record = mysqli_fetch_assoc($all_drinktypes_result)){
                            echo "<option value = '". $all_drinktypes_record['ProductTypeID'] . "'>";
                            echo $all_drinktypes_record['Name'];
                            echo "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Name: </td>
                <td>
                    <input type="text" name='bubbletea_name'>
                </td>
            </tr>
            <tr>
                <td> <!-- cost range? --> </td>
            </tr>
            <tr>
                <td>Only include hot bubble teas</td>
                <td>
                    <input type="checkbox" name='hot_bubbleteas' value="false" unchecked>
                </td>
            </tr>
            <tr>
                <td>Order Bubble Teas By: </td>
                <td>
                    <select id="order_bubbleteas" name="order_bubbleteas">
                        <option value="product_name_asc">Name Ascending</option>
                        <option value="product_name_desc">Name Descending</option>
                        <option value="cost_asc">Cost Ascending</option>
                        <option value="cost_desc">Cost Descending</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type='submit' name='search_button' value='Search'>
                </td>
            </tr>
        </table>
    </form>
</main>
</body>
<footer>

</footer>
