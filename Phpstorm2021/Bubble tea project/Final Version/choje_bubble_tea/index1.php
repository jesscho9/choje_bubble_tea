
<?php

session_start();

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "<span style='visibility: hidden'>connected to database</span>";

}

// drinktypes query that allows the user to select a drinktype they want to search for
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
    <div>
        <h2>Welcome!</h2>
        <p>This is an informational website about bubble tea, the best drink ever! </p>
        <p>There are no orders available here as this is a collation of the bubble tea on offer at Pearl Island, however
            this is the best informational bubble tea site there is. I do apologise in advance for any inconvenience
            this may cause for those of you wanting to order with us. Almost a blog, but not quite! Feel free to visit
            our stores and order in person. Even with Covid we are serving bubble tea but safely, we just don't want you
            to miss out on the best bubble tea in New Zealand. ;) We have stores in every big city in New Zealand and
            look forward to seeing you there!</p>
        <p>There are different sugar levels and ice levels to choose from as well as different sizes for some shops. So
            bubble tea caters for all kinds of people including those with a sweet tooths as well as those who prefer
            things not so sweet. </p>
    </div>
    <div>
        <h2>A Bit About Bubble Tea</h2>
        <p>Here is some history of bubble tea, for all you odd history lovers. <br> Bubble Tea originated in Taiwan, and
            since then has became internationally famous spreading throughout the world like wildfire! (though of course
            a good kind of wildfire) </p>
    </div>
    <h2>Filter your bubble tea search</h2>
    <p>Here you can pick specific criteria to filter your search, or simply click straight onto the menu tab, which will
        show you the whole menu at Pearl Island. </p>
    <!-- the form which allows a user to search and filter bubble teas -->
    <div class="search_bubbleteas">
        <form name='search_bubble_tea_form' id='search_bubble_tea_form' method = 'get' action='menu1.php'>
            <table>
                <tr>
                    <td>Drink series: </td>
                    <td>
                        <select id='drinktypes' name='drinktypes'>
                            <option value="">All Drink Series</option>
                            <!--shows the other options for drink series -->
                            <?php
                            while ($all_drinktypes_record = mysqli_fetch_assoc($all_drinktypes_result)){
                                echo "<option value = '" . $all_drinktypes_record['DrinkType'] . "'>";
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
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' name='search_button' value='Search'>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</main>
</body>
</html>
