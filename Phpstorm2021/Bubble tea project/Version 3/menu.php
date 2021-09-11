
<?php

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

// Products query to populate the dropdown form
$all_drinktypes_query = "SELECT * FROM `drinktypes`";
$all_drinktypes_result = mysqli_query($con, $all_drinktypes_query);

if(isset($_GET['drinktypes'])){
    $drink_type_id = $_GET['drinktypes'];
}else{
    $drink_type_id = "";
}

if(isset($_GET['bubbletea_name'])){
    $product_name =$_GET['bubbletea_name'];
}else{
    $product_name = "";
}

// leave cost for now

if(isset($_GET['hot_bubbleteas'])){
    $hot_bubbleteas = True;
}else{
    $hot_bubbleteas = False;
}

if(isset($_GET['order_bubbleteas'])){
    $order_bubbleteas =$_GET['order_bubbleteas'];
}else{
    $order_bubbleteas = "product_name_asc";
}

if(isset($_GET['search_button'])){
    $search_done = True;
}else{
    $search_done = False;
}

?>


<!DOCTYPE html>

<html lang="en">
<head>
    <title>
        Pearl Island Menu
    </title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='index_v3.1.css'>
</head>
<body>
<header>
    <nav>
        <a href="index_v3.1.php">Home</a>
        <a href="menu.php">Menu</a>
        <a href="specials.php">Specials</a>
    </nav>
</header>
<main>
    <!-- TODO table of products to go here-->

    <?php
    if($search_done == True) {
    ?>

    <h2>Products</h2>
    <p>Enter search criteria</p>

    <div>
        <form name='search_bubble_tea_form' id='search_bubble_tea_form' method = 'get' action='drinks_products.php'>
            <table>
                <tr>
                    <td>Drink series: </td>
                    <td>
                        <select id='drinktypes' name='drinktypes'>
                            <option value="">All Drink Series</option>
                            <!--shows the other options - php below-->
                            <?php
                            while ($all_drinktypes_record = mysqli_fetch_assoc($all_drinktypes_result)){
                                echo "<option value = '". $all_drinktypes_record['DrinkTypeID'] . "'>";
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
                    <td> cost range? </td>
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
    </div>
        <?php
    }else {
    ?>
    <h2>Menu</h2>
    <h4>Feel free to browse through the menu of bubble teas or search and filter bubble teas of your choice. </h4>
<!-- TODO -->
    <?php
    }

    $arguments_added = false;

    // All products query to get all products from the database, and will display certain values to the user
    $all_drinks_query = "SELECT * FROM drinks";
    if ($drink_type_id != "") {
        $all_drinks_query = $all_drinks_query . " WHERE DrinkTypeID = '" . $drink_type_id . "'";
        $arguments_added = true;
    }
    if ($product_name != "") {
        if ($arguments_added == true) {
            $all_drinks_query = $all_drinks_query . " AND ";
        } else {
            $all_drinks_query = $all_drinks_query . " WHERE ";
        }

        $all_drinks_query = $all_drinks_query . "Name LIKE '%$product_name%'";
        $arguments_added = true;
    }
    /*
    if ($max_cost != "") {
        if ($arguments_added == true) {
            $all_drinks_query = $all_drinks_query . " AND ";
        } else {
            $all_drinks_query = $all_drinks_query . " WHERE ";
        }

        $all_drinks_query = $all_drinks_query . "Cost <= " . $max_cost;
        $arguments_added = true;
    }
    */
    if ($hot_bubbleteas == True) {
        if ($arguments_added == true) {
            $all_drinks_query = $all_drinks_query . " AND ";
        } else {
            $all_drinks_query = $all_drinks_query . " WHERE ";
        }

        $all_drinks_query = $all_drinks_query . "AvailableForPurchase = 'Y'";
        $arguments_added = true;
    }
    $all_drinks_query = $all_drinks_query . " ORDER BY ";
    if ($order_bubbleteas == "product_name_asc" or $order_bubbleteas == "product_name_desc") {
        $all_drinks_query = $all_drinks_query . "Name ";
    } else {
        $all_drinks_query = $all_drinks_query . "Cost ";
    }
    if ($order_bubbleteas == "product_name_asc" or $order_bubbleteas == "cost_asc") {
        $all_drinks_query = $all_drinks_query . "ASC";
    } else {
        $all_drinks_query = $all_drinks_query . "DESC";
    }

    $all_drinks_result = mysqli_query($con, $all_drinks_query);
    $count =mysqli_num_rows($all_drinks_result);
    if($count == 0) {
        echo "<br>There were no search results.";
    }else {
    ?>
    <table>
        <tr>
            <td>
                <h3>Name</h3>
            </td>
            <td>
                <h3>Regular Price</h3>
            </td>
            <td>
                <h3>Large Price</h3>
            </td>
            <td>
                <h3>Can Be Hot</h3>
            </td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($all_drinks_result)) {
            echo "<tr>";
            echo "<td>". $row['Name'] ."</td>";
            echo "<td>". $row['RPrice'] ."</td>";
            echo "<td>". $row['LPrice'] ."</td>";
            echo "<td>". $row['CanBeHot'] ."</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    }
    ?>
</main>
</body>
<footer>

</footer>
</html>
